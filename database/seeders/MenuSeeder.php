<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('menus')->insert([
            [
                'name' => 'Chicken Parmesan',
                'image' => 'chicken-parmesan.jpg',
                'price' => 16.99,
                'ingredients' => 'Breaded chicken breast, marinara sauce, mozzarella cheese, spaghetti',
                'description' => 'Tender chicken breast coated in breadcrumbs, topped with marinara sauce and melted cheese, served with spaghetti',
                'category_id' => 2, // Remplacer par l'ID de la catégorie correspondante
                'chef_id' => 3, // Remplacer par l'ID du chef correspondant
            ],
            [
                'name' => 'Fish and Chips',
                'image' => 'fish-and-chips.jpg',
                'price' => 13.99,
                'ingredients' => 'Beer-battered cod fillet, fries, tartar sauce',
                'description' => 'Crispy fried cod fillet served with golden fries and tangy tartar sauce',
                'category_id' => 1, // Remplacer par l'ID de la catégorie correspondante
                'chef_id' => 2, // Remplacer par l'ID du chef correspondant
            ],
            [
                'name' => 'Beef Stir-Fry',
                'image' => 'beef-stir-fry.jpg',
                'price' => 18.99,
                'ingredients' => 'Beef strips, bell peppers, onions, broccoli, soy sauce',
                'description' => 'Tender beef strips stir-fried with colorful vegetables in a savory soy sauce',
                'category_id' => 4, // Remplacer par l'ID de la catégorie correspondante
                'chef_id' => 1, // Remplacer par l'ID du chef correspondant
            ],
            [
                'name' => 'Vegetable Curry',
                'image' => 'vegetable-curry.jpg',
                'price' => 14.99,
                'ingredients' => 'Assorted vegetables, curry sauce, coconut milk, rice',
                'description' => 'A flavorful vegetarian curry made with assorted vegetables and aromatic spices, served with rice',
                'category_id' => 5, // Remplacer par l'ID de la catégorie correspondante
                'chef_id' => 3, // Remplacer par l'ID du chef correspondant
            ],
            [
                'name' => 'Beef Burger',
                'image' => 'beef-burger.jpg',
                'price' => 11.99,
                'ingredients' => 'Beef patty, lettuce, tomato, onion, pickles, cheese, brioche bun',
                'description' => 'Juicy beef patty topped with fresh vegetables and melted cheese, served on a toasted brioche bun',
                'category_id' => 1, // Remplacer par l'ID de la catégorie correspondante
                'chef_id' => 2, // Remplacer par l'ID du chef correspondant
            ],
            [
                'name' => 'Chicken Curry',
                'image' => 'chicken-curry.jpg',
                'price' => 16.99,
                'ingredients' => 'Chicken, curry sauce, coconut milk, potatoes, carrots, rice',
                'description' => 'Tender chicken pieces cooked in a fragrant curry sauce with vegetables, served with rice',
                'category_id' => 5, // Remplacer par l'ID de la catégorie correspondante
                'chef_id' => 1, // Remplacer par l'ID du chef correspondant
            ],
            [
                'name' => 'Cheese Pizza',
                'image' => 'cheese-pizza.jpg',
                'price' => 10.99,
                'ingredients' => 'Tomato sauce, mozzarella cheese',
                'description' => 'A simple yet delicious pizza topped with tomato sauce and melted mozzarella cheese',
                'category_id' => 3, // Remplacer par l'ID de la catégorie correspondante
                'chef_id' => 2, // Remplacer par l'ID du chef correspondant
            ],
            [
                'name' => 'Chicken Salad',
                'image' => 'chicken-salad.jpg',
                'price' => 9.99,
                'ingredients' => 'Grilled chicken, mixed greens, tomatoes, cucumbers, carrots, dressing',
                'description' => 'Grilled chicken served over a bed of fresh mixed greens with assorted vegetables and your choice of dressing',
                'category_id' => 2, // Remplacer par l'ID de la catégorie correspondante
                'chef_id' => 3, // Remplacer par l'ID du chef correspondant
            ],
            [
                'name' => 'Chocolate Cake',
                'image' => 'chocolate-cake.jpg',
                'price' => 7.99,
                'ingredients' => 'Chocolate cake, chocolate frosting',
                'description' => 'Decadent chocolate cake with rich chocolate frosting, perfect for dessert lovers',
                'category_id' => 4, // Remplacer par l'ID de la catégorie correspondante
                'chef_id' => 2, // Remplacer par l'ID du chef correspondant
            ],
            [
                'name' => 'Vegetarian Pizza',
                'image' => 'vegetarian-pizza.jpg',
                'price' => 12.99,
                'ingredients' => 'Tomato sauce, mozzarella cheese, bell peppers, onions, mushrooms, olives',
                'description' => 'Delicious pizza loaded with fresh vegetables and melted mozzarella cheese, perfect for vegetarians',
                'category_id' => 3, // Remplacer par l'ID de la catégorie correspondante
                'chef_id' => 1, // Remplacer par l'ID du chef correspondant
            ],
        ]);


    }
}






  // Générer 60 produits avec des noms, des images, des prix, des ingrédients et des descriptions aléatoires
        // for ($i = 1; $i <= 60; $i++) {
        //     $products[] = [
        //         'name' => 'Product ' . $i,
        //         'image' => 'product-' . $i . '.jpg',
        //         'price' => rand(5, 50) + (rand(0, 99) / 100), // Prix aléatoire entre 5 et 50 avec 2 décimales
        //         'ingredients' => 'Ingredients ' . $i,
        //         'description' => 'Description for Product ' . $i,
        //         'category_id' => rand(1, 5), // ID de catégorie aléatoire entre 1 et 5 (à adapter à vos besoins)
        //         'chef_id' => rand(1, 10), // ID de chef aléatoire entre 1 et 10 (à adapter à vos besoins)
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ];
        // }

        // Insérer les données dans la table
        // Product::insert($products);
    
