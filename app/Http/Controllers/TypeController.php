<?php

namespace App\Http\Controllers;

use finfo;
use App\Models\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;

class TypeController extends Controller
{

                public function index() {
            
                    $types = Type::all();
            
                    return response()->json([
                        'data' => $types
                    ]);
                }
            
                public function store(Request $request) {
            
                    $request->validate([
                        'type' => 'required|string|max:255',
                    ],
                [
                    'type.required' => 'የአይነት ያስገቡ',
                ]);
            
                    $type = new Type();
                    $type->type = $request->type;
                    $type->save();
            
                    return response()->json([
                        'message' => 'type Successfully Created',
                    ], 201);
                }
            
                public function show(Type $type) {
                    
                    return response()->json([
                        'data' => $type
                    ]); 
                }
            
                public function update(Request $request, Type $type) {
            
                    $request->validate([
                        'type' => 'required|string|max:255',
                    ],
                [
                    'type.required' => 'የአይነት ያስገቡ',
                ]);
            
                    $type->type = $request->type;
                    $type->save();
            
                    return response()->json([
                        'message' => 'type Updated Successfully',
                    ]);
                }
            
                public function destroy(Type $type) {
                    $type->delete();
                    return response()->json(['message' => 'type deleted successfully!']);
                }
            }
            
    
