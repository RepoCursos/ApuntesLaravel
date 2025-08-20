<?php

// =============================================================================
// 3. Realizando consultas con ELOQUENT ORM
// =============================================================================

namespace App\Http\Controllers;

// SELECT básico
$users = User::all();
$user = User::find(1);
$user = User::where('email', 'juan@example.com')->first();

// SELECT con condiciones
$activeUsers = User::where('active', 1)->get();
$recentUsers = User::where('created_at', '>=', now()->subDays(7))->get();

// SELECT con múltiples condiciones
$users = User::where('active', 1)
    ->where('email_verified_at', '!=', null)
    ->orderBy('created_at', 'desc')
    ->take(10)
    ->get();

// SELECT con relaciones (Eager Loading)
$users = User::with('posts', 'profile')->get();
$posts = Post::with('user', 'category', 'tags')->get();

// SELECT con condiciones en relaciones
$usersWithPosts = User::whereHas('posts', function ($query) {
    $query->where('published', 1);
})->get();

// SELECT con conteo de relaciones
$users = User::withCount('posts')->get();

// CREATE (INSERT)
$user = User::create([
    'name' => 'Nuevo Usuario',
    'email' => 'nuevo@example.com',
    'password' => bcrypt('password')
]);

// CREATE usando new y save
$user = new User();
$user->name = 'Otro Usuario';
$user->email = 'otro@example.com';
$user->password = bcrypt('password');
$user->save();

// UPDATE
$user = User::find(1);
$user->update(['name' => 'Nombre Actualizado']);

// UPDATE usando save
$user = User::find(1);
$user->name = 'Nuevo Nombre';
$user->save();

// UPDATE masivo
User::where('active', 0)->update(['status' => 'inactive']);

// DELETE
$user = User::find(1);
$user->delete();

// DELETE masivo
User::where('last_login_at', '<', now()->subYear())->delete();

// Soft Delete (requiere trait SoftDeletes)
$user->delete(); // Soft delete
$user->forceDelete(); // Hard delete
$trashedUsers = User::onlyTrashed()->get();
$user->restore(); // Restaurar soft deleted

// Relaciones - Crear registros relacionados
$user = User::find(1);
$post = $user->posts()->create([
    'title' => 'Nuevo Post',
    'content' => 'Contenido del post'
]);

// Relaciones - Asociar registros existentes
$user = User::find(1);
$post = Post::find(5);
$user->posts()->save($post);

// Relaciones Many-to-Many
$post = Post::find(1);
$tag = Tag::find(3);
$post->tags()->attach($tag->id);
$post->tags()->detach($tag->id);
$post->tags()->sync([1, 2, 3]); // Sincronizar tags

// Scopes locales
class User extends Model
{
    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
    
    public function scopeByRole($query, $role)
    {
        return $query->where('role', $role);
    }
}

// Uso de scopes
$activeUsers = User::active()->get();
$admins = User::active()->byRole('admin')->get();

// Mutators y Accessors
class User extends Model
{
    // Mutator - se ejecuta al asignar valor
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
    
    // Accessor - se ejecuta al obtener valor
    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}

// Uso de mutator y accessor
$user = new User();
$user->password = 'mi_password'; // Se encripta automáticamente
echo $user->full_name; // Combina first_name y last_name

// Consultas avanzadas con Eloquent
$posts = Post::with('user')
    ->where('published', 1)
    ->whereHas('category', function ($query) {
        $query->where('name', 'Tecnología');
    })
    ->orderBy('created_at', 'desc')
    ->paginate(10);

// Búsqueda con OR conditions
$users = User::where('name', 'like', '%Juan%')
    ->orWhere('email', 'like', '%juan%')
    ->get();

// Uso de firstOrCreate y updateOrCreate
$user = User::firstOrCreate(
    ['email' => 'test@example.com'],
    ['name' => 'Test User', 'password' => bcrypt('password')]
);

$user = User::updateOrCreate(
    ['email' => 'test@example.com'],
    ['name' => 'Updated Name', 'active' => 1]
);