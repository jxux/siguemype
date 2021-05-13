<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('dni')->unique();
            $table->string('name');
            $table->string('nick_name');
            $table->string('email')->unique();
            $table->date('date_birth')->nullable();
            $table->string('profile_photo_path')->nullable();
            $table->enum('sex', ['M', 'F'])->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('api_token')->unique()->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            'dni' => '99999999',
            'nick_name'=> 'Master',
            'name' => 'Cuenta Mastar',
            'email' => 'master@jjmm.com.pe',
            // 'sex' => '',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
        ]);

        DB::table('users')->insert([
            'dni' => '42253285',
            'nick_name'=> 'Luz',
            'name' => 'LUZ MARLENE ESCALANTE ZAPATA',
            'email' => 'lescalante@jjmm.com.pe',
            'sex' => 'F',
            'password' => '$2y$10$ApJnaHTszDAp5DBypMdITurlKP4j9.ovIZG9D7s0VAY6g1.0x0TTC'
        ]);
        DB::table('users')->insert([
            'dni' => '73086871',
            'nick_name'=> 'Cristian',
            'name' => 'CRISTIAN MEYER HUAMAN BRAVO',
            'email' => 'cristian.huaman@jjmm.com.pe',
            'sex' => 'M',
            'password' => '$2y$10$bjrMlsmuyxPZsVC63N66VeeTK.nvnqwRgHzlv24baDCcmtmCd9YsG'
        ]);
        DB::table('users')->insert([
            'dni' => '71567250',
            'nick_name'=> 'jorge',
            'name' => 'JORGE LUIS HUAPAYA ROJAS',
            'email' => 'jorge.huapaya@jjmm.com.pe',
            'sex' => 'M',
            'password' => '$2y$10$vBXoXNkJ7Sdqch.7M0YX5Ot9mkVEn6MV6s8PkPDigV9GdmY5ysi/m'
        ]);
        DB::table('users')->insert([
            'dni' => '73018425',
            'nick_name'=> 'Josue',
            'name' => 'JOSUE WILLIAM HUGO QUISPE',
            'email' => 'jouse.hugo@jjmm.com.pe',
            'sex' => 'M',
            'password' => '$2y$10$IuOSiZ2RBHYHzKpaQUaTyu/rrVxfWGtJF9fYFnmBN0CnbPAKII74q'
        ]);
        DB::table('users')->insert([
            'dni' => '75398839',
            'nick_name'=> 'Aracely',
            'name' => 'LEANDRA ARACELY LOPEZ VILLEGAS',
            'email' => 'aracely.lopez@jjmm.com.pe',
            'sex' => 'F',
            'password' => '$2y$10$mXdv3SwLD51A6xhfi2nAouSgXZK2T5xAlK.UY0VZ3dgmdbi0.78eS'
        ]);
        DB::table('users')->insert([
            'dni' => '76980414',
            'nick_name'=> 'Katerin',
            'name' => 'KATERIN PADILLA',
            'email' => 'katerin.padilla@jjmm.com.pe',
            'sex' => 'F',
            'password' => '$2y$10$ALjRaM0eczbWLjEEaeXIW.wUxKWfEWdOu.n5TUyWo/UjKsX6g9OGC'
        ]);
        DB::table('users')->insert([
            'dni' => '44180333',
            'nick_name'=> 'Rossana',
            'name' => 'ROSSANA ELIZABETH VILA HUAPAYA',
            'email' => 'rossana.vila@jjmm.com.pe',
            'sex' => 'F',
            'password' => '$2y$10$ByxdT1oynCxuEiP1GetRP.NJgABiso0KuPrzobIuSFKVY34hNk/s.'
        ]);
        DB::table('users')->insert([
            'dni' => '77539868',
            'nick_name'=> 'Eduardo',
            'name' => 'JOSE EDUARDO MARIÑAS ABUADBA',
            'email' => 'eduardo.marinas@jjmm.com.pe',
            'sex' => 'M',
            'password' => '$2y$10$bW54X3YOEUstZtPQarzyBull9tImoXZ0gD4M1piUgJHvqmQe0vnQq'
        ]);
        DB::table('users')->insert([
            'dni' => '80275925',
            'nick_name'=> 'Erik',
            'name' => 'ERIK JIMMY MARIÑAS MENDOZA',
            'email' => 'erik.marinas@jjmm.com.pe',
            'sex' => 'M',
            'password' => '$2y$10$sR.IlDJ875ynTCI8Pgs5Wea5DZHS60QdyLSd.MWNguXAusmEmlBVe'
        ]);
        DB::table('users')->insert([
            'dni' => '41197080',
            'nick_name'=> 'Juan',
            'name' => 'JUAN JOSE MARIÑAS MENDOZA',
            'email' => 'juan.marinas@jjmm.com.pe',
            'sex' => 'M',
            'password' => '$2y$10$.cO7ylhPTROeg0GWfQhHKufsPQ1mq9R4E8Y5s6MOygd9vMm9YPtFG'
        ]);
        DB::table('users')->insert([
            'dni' => '70157585',
            'nick_name'=> 'Brandon',
            'name' => 'BRANDON JESUS SALDAÑA HUAYLLAZO',
            'email' => 'brandon.saldana@jjmm.com.pe',
            'sex' => 'M',
            'password' => '$2y$10$H35wXEAU/ToeRL3GCsf4g.soEM7qkeqRf2EECBD7KSdHiNI/CSV6m'
        ]);
        DB::table('users')->insert([
            'dni' => '47523497',
            'nick_name'=> 'Jesus',
            'name' => 'JESUS ALEXANDER GARCIA FLORES',
            'email' => 'soporte@jjmm.com.pe',
            'sex' => 'M',
            'password' => '$2y$10$Ga4/tt/cSgUZXflQkg4LBOfbsqZfH3RP8ZNJNiPkpFZ8hd/X/qKd2'
        ]);
        DB::table('users')->insert([
            'dni' => '47598524',
            'nick_name'=> 'Zulay',
            'name' => 'ZULAY DELGADO FRIAS',
            'email' => 'zulay.delgado@jjmm.com.pe',
            'sex' => 'F',
            'password' => '$2y$10$EI456/hV844Hvml81CecXeZJlYr9pXkhUXaIqJ5gmOSXe9x.fJGo.'
        ]);
        DB::table('users')->insert([
            'dni' => '70046650',
            'nick_name'=> 'Jessica',
            'name' => 'JESSICA JOHANA CASTILLO VEGA',
            'email' => 'jessica.castillo@jjmm.com.pe',
            'sex' => 'F',
            'password' => '$2y$10$kjzlkjbxzRcUxuwhfMsvVORY2EuDxwqe9hBsRvYiFoEmouWegj6sK'
        ]);
        DB::table('users')->insert([
            'dni' => '70207357',
            'nick_name'=> 'Jaira',
            'name' => 'DINA JAIRA SOLIS LUGO',
            'email' => 'dina.solis@jjmm.com.pe',
            'sex' => 'F',
            'password' => '$2y$10$KMoKinARy22SicBJJ.5nA.bR4pXaMc/JkId9ghR8UryNUHMyRRlEe'
        ]);
        DB::table('users')->insert([
            'dni' => '77815094',
            'nick_name'=> 'Paul',
            'name' => 'PAUL ANDRE MARIÑAS ABUHADBA',
            'email' => 'paul.marinas@jjmm.com.pe',
            'sex' => 'M',
            'password' => '$2y$10$jpHq5tnUMLPVve4LGQRDv.mEWfLDcECfRfBqTYDh06YX3QYAR73Oi'
        ]);
        DB::table('users')->insert([
            'dni' => '76478000',
            'nick_name'=> 'andrea',
            'name' => 'ANDREA ALEJANDRA ZAVALETA MARIÑAS',
            'email' => 'andrea.zavaleta@jjmm.com.pe',
            'sex' => 'F',
            'password' => '$2y$10$65RXxRkHN.5KgW.YuWc2XusKwKpP.mHVsAm.vsQtzzFCWaZrOc9j6'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
