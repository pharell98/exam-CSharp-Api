<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Exception;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    public function create(Request $request)
    {
        try {
            $request->validate([
                'libelle' => 'required|string|max:255',
                'description' => 'required|string',
                'pu' => 'required|',
            ]);

            $produit = Produit::create([
                'libelle' => $request->libelle,
                'description' => $request->description,
                'pu' => $request->pu,
            ]);

            return response()->json([
                'status' => 201,
                'success' => true,
                'message' => 'Product created successfully',
                'produit' => $produit,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'statusCode' => 500,
                'success' => false,
                'message' => 'Product NOT created successfully',
                'error' => $e->getMessage()
            ]);
        }
    }

    public function get()
    {
        try {
            $produits = Produit::all();

            return response()->json([
                'status' => 200,
                'success' => true,
                'produits' => $produits,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 500,
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'libelle' => 'required|string|max:255',
                'description' => 'required|string',
                'pu' => 'required|',
            ]);

            $produit = Produit::find($id);
         
           $produit->libelle = $request->libelle;
           $produit->description = $request->description;
           $produit->pu = $request->pu;
           $produit->save();

            return response()->json([
                'status' => 201,
                'success' => true,
                'message' => 'Product modify successfully',
                'produit' => $produit,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'statusCode' => 500,
                'success' => false,
                'message' => 'Product NOT created successfully',
                'error' => $e->getMessage()
            ]);
        }
    }
}
