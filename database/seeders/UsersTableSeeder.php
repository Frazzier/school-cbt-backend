<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin',
                'email' => 'admin@email.com',
                'role' => 'admin',
                'profile_picture' => '/assets/images/default-profile-picture.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$eP3bSXm6fDXFaCGI1kUzR.2g87w7K6WWKREqhYCCmMkArn1SJ.JbS',
                'remember_token' => NULL,
                'created_at' => '2021-09-17 04:29:10',
                'updated_at' => '2021-09-17 04:29:10',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Teacher 1',
                'email' => 'teacher1@email.com',
                'role' => 'teacher',
                'profile_picture' => '/assets/images/default-profile-picture.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$EL8HmQwZG8mPMJLDlf3pnOpwm41hA8E7I4Hb3CJ5gttwatzI4G892',
                'remember_token' => NULL,
                'created_at' => '2022-05-07 18:24:29',
                'updated_at' => '2022-05-07 18:24:29',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Teacher 2',
                'email' => 'teacher2@email.com',
                'role' => 'teacher',
                'profile_picture' => '/assets/images/default-profile-picture.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$HAkRMsGjCr8tXYNSD4WaD.SlI2vO8.qkweBw.ofws/QxgyZeUFenO',
                'remember_token' => NULL,
                'created_at' => '2022-05-07 18:24:37',
                'updated_at' => '2022-05-07 18:24:37',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Teacher 3',
                'email' => 'teacher3@email.com',
                'role' => 'teacher',
                'profile_picture' => '/assets/images/default-profile-picture.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$tcvzxwUhW8QhtsfJQg1vp.DV4J.jXCswxeC4QtLglURp.3Yu.Sc7a',
                'remember_token' => NULL,
                'created_at' => '2022-05-07 18:24:43',
                'updated_at' => '2022-05-07 18:24:43',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Teacher 4',
                'email' => 'teacher4@email.com',
                'role' => 'teacher',
                'profile_picture' => '/assets/images/default-profile-picture.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$XpLzBsxI1FDyZCykzBDdO.zscQIdDNuznLAsdMT4x5/OwXRdlW9te',
                'remember_token' => NULL,
                'created_at' => '2022-05-07 18:24:52',
                'updated_at' => '2022-05-07 18:24:52',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Teacher 5',
                'email' => 'teacher5@email.com',
                'role' => 'teacher',
                'profile_picture' => '/assets/images/default-profile-picture.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$ty5bfAi/DmnWGe5Sn7izruFiowR/tdkebq.jdtzFXQJYVOgcnP7d6',
                'remember_token' => NULL,
                'created_at' => '2022-05-07 18:24:59',
                'updated_at' => '2022-05-07 18:24:59',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Teacher 6',
                'email' => 'teacher6@email.com',
                'role' => 'teacher',
                'profile_picture' => '/assets/images/default-profile-picture.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$vcAsqiaGtb8zoZZ0nYq3geEUR9mApjqwEOuQxJCVgTSQNjpR/Ium.',
                'remember_token' => NULL,
                'created_at' => '2022-05-07 18:25:12',
                'updated_at' => '2022-05-07 18:25:12',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Teacher 7',
                'email' => 'teacher7@email.com',
                'role' => 'teacher',
                'profile_picture' => '/assets/images/default-profile-picture.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$ZmUzKUhYMDFygV9MX2//y.zs2H0wC5pVsxn8IMXWFf7ioMq1gcU82',
                'remember_token' => NULL,
                'created_at' => '2022-05-07 18:25:20',
                'updated_at' => '2022-05-07 18:25:20',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Teacher 8',
                'email' => 'teacher8@email.com',
                'role' => 'teacher',
                'profile_picture' => '/assets/images/default-profile-picture.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$6Mms/.XbvScC3YE91rgBC.nCCyF9ZmO3oJ.rGEtydIxJk2n1Zre9.',
                'remember_token' => NULL,
                'created_at' => '2022-05-07 18:26:12',
                'updated_at' => '2022-05-07 18:26:12',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Teacher 9',
                'email' => 'teacher9@email.com',
                'role' => 'teacher',
                'profile_picture' => '/assets/images/default-profile-picture.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$TAFqMYGoVSZxu.KhQ7VyDeOH9eE19dYO8W4SppBdlf2uTXiIM6ndW',
                'remember_token' => NULL,
                'created_at' => '2022-05-07 18:26:23',
                'updated_at' => '2022-05-07 18:26:23',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Teacher 10',
                'email' => 'teacher10@email.com',
                'role' => 'teacher',
                'profile_picture' => '/assets/images/default-profile-picture.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$Xqs1jbbmvrgwts.1Y3lHp.i9yFiqn8AOu/6XMC6jo7Slc1BvzJ42u',
                'remember_token' => NULL,
                'created_at' => '2022-05-07 18:26:41',
                'updated_at' => '2022-05-07 18:26:41',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Teacher 11',
                'email' => 'teacher11@email.com',
                'role' => 'teacher',
                'profile_picture' => '/assets/images/default-profile-picture.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$rYZJ/vSR7YACTyTs5ojUhOf4fB9zmxFkaWQmNVk1xfB.qouFcli4y',
                'remember_token' => NULL,
                'created_at' => '2022-05-07 18:26:48',
                'updated_at' => '2022-05-07 18:26:48',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Teacher 12',
                'email' => 'teacher12@email.com',
                'role' => 'teacher',
                'profile_picture' => '/assets/images/default-profile-picture.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$2Mn6CCJrTEFtY/VnoadiKOR1FzpRVoZs4OTggqNpSQUwL8DgORq5i',
                'remember_token' => NULL,
                'created_at' => '2022-05-07 18:26:53',
                'updated_at' => '2022-05-07 18:26:53',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Teacher 13',
                'email' => 'teacher13@email.com',
                'role' => 'teacher',
                'profile_picture' => '/assets/images/default-profile-picture.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$u3jmUQA17qPe7edKopzhC.zOuZvx90RCOS3ttoxws5eScQYjKLlXy',
                'remember_token' => NULL,
                'created_at' => '2022-05-07 18:26:57',
                'updated_at' => '2022-05-07 18:26:57',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Teacher 14',
                'email' => 'teacher14@email.com',
                'role' => 'teacher',
                'profile_picture' => '/assets/images/default-profile-picture.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$FESmaRVJOjfj5HRPwKMuzOD68i9D1J2FbFsgbb6Ddz8Jew2jjiLqi',
                'remember_token' => NULL,
                'created_at' => '2022-05-07 18:27:01',
                'updated_at' => '2022-05-07 18:27:01',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Teacher 15',
                'email' => 'teacher15@email.com',
                'role' => 'teacher',
                'profile_picture' => '/assets/images/default-profile-picture.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$TfGFPxGi.wMGLbG/f0/QhOuv4eY0P.FYyFZvamjYVmMz9EhXlFx9q',
                'remember_token' => NULL,
                'created_at' => '2022-05-07 18:27:04',
                'updated_at' => '2022-05-07 18:27:04',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Teacher 16',
                'email' => 'teacher16@email.com',
                'role' => 'teacher',
                'profile_picture' => '/assets/images/default-profile-picture.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$n6V31WZBxffgOuOphULxv.d5WKHM.e/ydr/MX1iFiQQR/eQSdz9sC',
                'remember_token' => NULL,
                'created_at' => '2022-05-07 18:27:10',
                'updated_at' => '2022-05-07 18:27:10',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'Teacher 17',
                'email' => 'teacher17@email.com',
                'role' => 'teacher',
                'profile_picture' => '/assets/images/default-profile-picture.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$6NBiCFGxGpYk1qFHERPJp.ThKixlhMjuNvmnhD7aEm.ghFdJV5nVi',
                'remember_token' => NULL,
                'created_at' => '2022-05-07 18:27:14',
                'updated_at' => '2022-05-07 18:27:14',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'Teacher 18',
                'email' => 'teacher18@email.com',
                'role' => 'teacher',
                'profile_picture' => '/assets/images/default-profile-picture.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$pgO1hZh1xA4k4Htws5jUXOZBfbMVdutFyzWFGiHYaYGkLkkFqgkxG',
                'remember_token' => NULL,
                'created_at' => '2022-05-07 18:27:20',
                'updated_at' => '2022-05-07 18:27:20',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'Teacher 19',
                'email' => 'teacher19@email.com',
                'role' => 'teacher',
                'profile_picture' => '/assets/images/default-profile-picture.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$AQWxpPkvyyL52xPADlofxOba3BF6e0.VqdBu8RWBeQwLUO/lJ3.i2',
                'remember_token' => NULL,
                'created_at' => '2022-05-07 18:27:27',
                'updated_at' => '2022-05-07 18:27:27',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'Teacher 20',
                'email' => 'teacher20@email.com',
                'role' => 'teacher',
                'profile_picture' => '/assets/images/default-profile-picture.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$lnASekQDFJ1t4MzVfo2GRuYqsci6cIMw46J7xIzixbpMalKjdrizC',
                'remember_token' => NULL,
                'created_at' => '2022-05-07 18:27:33',
                'updated_at' => '2022-05-07 18:27:33',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'Teacher 21',
                'email' => 'teacher21@email.com',
                'role' => 'teacher',
                'profile_picture' => '/assets/images/default-profile-picture.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$v5n/y7n7FndE56eVhO0e2eEVxC4IkkXm7x0Vx26K0.Ksh7MnC00RC',
                'remember_token' => NULL,
                'created_at' => '2022-05-07 18:27:38',
                'updated_at' => '2022-05-07 18:27:38',
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'Teacher 22',
                'email' => 'teacher22@email.com',
                'role' => 'teacher',
                'profile_picture' => '/assets/images/default-profile-picture.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$/7spBk4caLRCZfSOQ59reOv1FXcNO9ycXzeJ.THAGntuHr0j8MCRy',
                'remember_token' => NULL,
                'created_at' => '2022-05-07 18:27:41',
                'updated_at' => '2022-05-07 18:27:41',
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'Teacher 23',
                'email' => 'teacher23@email.com',
                'role' => 'teacher',
                'profile_picture' => '/assets/images/default-profile-picture.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$DGqpaB1q2b56ZMenPCEZIens.iCbzLQa7rDlOsh8OCQxDv0MNf2He',
                'remember_token' => NULL,
                'created_at' => '2022-05-07 18:27:44',
                'updated_at' => '2022-05-07 18:27:44',
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'Teacher 24',
                'email' => 'teacher24@email.com',
                'role' => 'teacher',
                'profile_picture' => '/assets/images/default-profile-picture.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$xnAI8h8jlKmudFYuFpgDFeMk.j.wEILKDyaq/zjjHs/4IdRNT00Ai',
                'remember_token' => NULL,
                'created_at' => '2022-05-07 18:27:47',
                'updated_at' => '2022-05-07 18:27:47',
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'Teacher 25',
                'email' => 'teacher25@email.com',
                'role' => 'teacher',
                'profile_picture' => '/assets/images/default-profile-picture.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$edsHJ0kkvObDum0vaT8HnuOMdcwo.L4ywjb1k47iOR8CIr9qlUrsC',
                'remember_token' => NULL,
                'created_at' => '2022-05-07 18:27:51',
                'updated_at' => '2022-05-07 18:27:51',
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'Teacher 26',
                'email' => 'teacher26@email.com',
                'role' => 'teacher',
                'profile_picture' => '/assets/images/default-profile-picture.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$tBLfEgJH4TVbkN0PBJK9/uU1GqVP836MEU3APMxAWgkxESJLIBE3C',
                'remember_token' => NULL,
                'created_at' => '2022-05-07 18:31:04',
                'updated_at' => '2022-05-07 18:31:04',
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'Teacher 27',
                'email' => 'teacher27@email.com',
                'role' => 'teacher',
                'profile_picture' => '/assets/images/default-profile-picture.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$0GnrUsrZLjAU4rK6fwNgSeTCTBbCnFN0mIcUiD6OS4lQFIPdyIWP.',
                'remember_token' => NULL,
                'created_at' => '2022-05-07 18:31:31',
                'updated_at' => '2022-05-07 18:31:31',
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'student 1',
                'email' => 'student1@email.com',
                'role' => 'student',
                'profile_picture' => '/assets/images/default-profile-picture.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$Y/RLXzB8Hcqg3GNUMWNxguNVrXuQsvYE/r9lbbJGJDT1JoM646Wke',
                'remember_token' => NULL,
                'created_at' => '2022-05-08 11:15:10',
                'updated_at' => '2022-05-08 11:15:10',
            ),
        ));
        
        
    }
}