<?php

// =============================================================================
// 2. Realizando consultas con QUERY BUILDER
// =============================================================================
// QUERY BUILDER: Son consultas construidas usando un generador de consultas asociativas
namespace App\Http\Controllers;

/* Ejemplos simple de uso */
// SELECT básico
$users = DB::table('users')->get();

// SELECT con condiciones
$activeUsers = DB::table('users')
                ->where('active', 1)
                ->where('email_verified_at', '!=', null)
                ->get();

// SELECT con múltiples condiciones
$users = DB::table('users')
    ->where('active', 1)
    ->where(function ($query) {
        $query->where('role', 'admin')
              ->orWhere('role', 'editor');
    })
    ->orderBy('created_at', 'desc')
    ->limit(10)
    ->get();

// SELECT con JOINs
$posts = DB::table('posts')
    ->join('users', 'posts.user_id', '=', 'users.id')
    ->join('categories', 'posts.category_id', '=', 'categories.id')
    ->select('posts.*', 'users.name as author', 'categories.name as category')
    ->where('posts.published', 1)
    ->get();

// LEFT JOIN
$users = DB::table('users')
    ->leftJoin('posts', 'users.id', '=', 'posts.user_id')
    ->select('users.*', DB::raw('COUNT(posts.id) as posts_count'))
    ->groupBy('users.id')
    ->get();

// INSERT
DB::table('users')->insert([
    'name' => 'María García',
    'email' => 'maria@example.com',
    'password' => bcrypt('password123'),
    'created_at' => now(),
    'updated_at' => now()
]);

// INSERT múltiple
DB::table('users')->insert([
    ['name' => 'Pedro', 'email' => 'pedro@example.com', 'created_at' => now()],
    ['name' => 'Ana', 'email' => 'ana@example.com', 'created_at' => now()],
]);

// INSERT y obtener ID
$id = DB::table('users')->insertGetId([
    'name' => 'Carlos López',
    'email' => 'carlos@example.com',
    'created_at' => now()
]);

// UPDATE
DB::table('users')
    ->where('id', 1)
    ->update(['email' => 'nuevo@example.com']);

// UPDATE con incremento
DB::table('posts')
    ->where('id', 1)
    ->increment('views', 1);

// DELETE
DB::table('users')
    ->where('active', 0)
    ->where('last_login_at', '<', now()->subMonths(6))
    ->delete();

// Agregaciones
$userCount = DB::table('users')->count();
$averageAge = DB::table('users')->avg('age');
$maxSalary = DB::table('salaries')->max('amount');

// HAVING clause
$categories = DB::table('posts')
    ->select('category_id', DB::raw('COUNT(*) as total'))
    ->groupBy('category_id')
    ->having('total', '>', 5)
    ->get();

// Subconsultas
$expensivePosts = DB::table('posts')
    ->where('budget', '>', function ($query) {
        $query->select(DB::raw('AVG(budget)'))
              ->from('posts');
    })
    ->get();