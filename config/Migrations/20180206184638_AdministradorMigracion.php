<?php
use Migrations\AbstractMigration;
use Cake\Auth\DefaultPasswordHasher;

class AdministradorMigracion extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function up()
    {
//         /*$faker = \Faker\Factory::create();
//         $populator = new Faker\ORM\CakePHP\Populator($faker);

//         $populator->addEntity('Usuario',1,[
//             'cedula'=>'115530352',
//             'nombre'=>'Carolina',
//             'primer_ape'=>'Mora',
//             'segundo_ape'=>'Cordero',
//             'puesto'=>'administrador',
//             'password'=>function(){
//                 $hasher = new DefaultPasswordHasher();
//                 return $hasher-> hash('secret');
//             },
        
//            /* 'cedula'=>'115530352',
//             'nombre'=>'Elena',
//             'primer_ape'=>'Duran',
//             'segundo_ape'=>'Rojas',
//             'puesto'=>'dependiente',
//             'password'=>function(){
//                 $hasher = new DefaultPasswordHasher();
//                 return $hasher-> hash('secret');
//             },
        
//              'cedula'=>'115530353',
//             'nombre'=>'Victoria',
//             'primer_ape'=>'Cordero',
//             'segundo_ape'=>'Torres',
//             'puesto'=>'mecanico',
//             'password'=>function(){
//                 $hasher = new DefaultPasswordHasher();
//                 return $hasher-> hash('secret');
//             },*/
//         ]);

//         $populator->addEntity('Usuario',10,[
//             'cedula'=> function(){
//                 return rand(100000000,799999999);
//             },
//             'nombre'=>function() use($faker){
//                 return $faker->nombre();
//             },
//             'primer_ape'=>function() use($faker){
//                 return $faker->primer_ape();
//             },
//             'segundo_ape'=>function() use($faker){
//                 return $faker->segundo_ape();
//             },
//             'puesto'=>'dependiente',
//             'password'=>function(){
//                 $hasher = new DefaultPasswordHasher();
//                 return $hasher-> hash('secret');
//             },

// ]);
//         $populator->addEntity('Usuario',10,[
//              'cedula'=> function(){
//                 return rand(100000000,799999999);
//             },
//             'nombre'=>function() use($faker){
//                 return $faker->nombre();
//             },
//             'primer_ape'=>function() use($faker){
//                 return $faker->primer_ape();
//             },
//             'segundo_ape'=>function() use($faker){
//                 return $faker->segundo_ape();
//             },
//             'password'=>function(){
//                 $hasher = new DefaultPasswordHasher();
//                 return $hasher-> hash('secret');
//             },


//         ]);
//         $populator->execute();
     }
}
