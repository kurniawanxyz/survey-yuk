<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Kriteria;
use App\Models\Pengerjaan;
use App\Models\Pertanyaan;
use App\Models\Survei;
use App\Models\SurveiGroup;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
// use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        DB::table('roles')->insert([
            'status' => 'pengguna'
        ]);

        DB::table('roles')->insert([
            'status' => 'surveyor'
        ]);

        DB::table("users")->insert([
            'nama' => 'admin',
            "role_id" => 2,
            "permission" => 1,
            "persetujuan_surveyor" => "disetujui",
            "email" => "admin@gmail.com",
            'password' => Hash::make("password"),
        ]);

        DB::table("users")->insert([
            'nama' => 'Adi Kurniawan',
            "role_id" => 1,
            "email" => "kurniawan@gmail.com",
            'password' => Hash::make("password"),
        ]);

        DB::table("groups")->insert([
            "nama" => "X RPL 1",
            "Deskripsi" => "RPL ANGKATAN 10",
            "code" => Str::random(7),
            "kreator_id" => 1,
        ]);

        DB::table('user_groups')->insert([
            "user_id" => 2,
            "group_id" => 1,
        ]);

        DB::table('surveis')->insert([
            "judul" => "Angket Terkait Kebiasaan Belajar",
            "deskripsi" => "Survei ini dibuat bertujuan untuk meneliti kebiasaan belajar siswa",
            "kreator_id" => 1,
            "status_pertanyaan" => true,
            "visibility" => "private",
            "created_at"=> now(),
        ]);

        DB::table('surveis')->insert([
            "judul" => "Angket Keadaan Pribadi Remaja",
            "deskripsi" => "Survei ini dibuat bertujuan untuk meneliti kebiasaan belajar siswa",
            "kreator_id" => 1,
            "status_pertanyaan" => true,
            "visibility" => "private",
            "created_at"=> now(),
        ]);

        $data1 = [
            [
                'text' => 'Saya dapat mengerjakan tugas tepat waktu walaupun banyak tugas yang lain',
                'status' => 'fav',
            ],
            [
                'text' => 'Saya berpikir, lebih bermanfaat jika mendengarkan penjelasan guru di depan daripada memperhatikan teman-teman di sekeliling saya yang asyik bercanda',
                'status' => 'fav',
            ],
            [
                'text' => 'Saya merasa keberatan jika harus menyelesaikan tugas tepat pada waktunya tanpa bantuan teman',
                'status' => 'unfav',
            ],
            [
                'text' => 'Saya terdorong untuk menyelesaikan tugas dengan segera setelah tugas diberikan oleh guru',
                'status' => 'fav',
            ],
            [
                'text' => 'Saya tidak makan sebelum belajar dengan tujuan di sela-sela waktu belajar, saya diizinkan orangtua untuk mengambil sebuah makanan atau melakukan aktivitas lainnya',
                'status' => 'fav',
            ],
            [
                'text' => 'Saya seringkali berusaha menyelesaikan tugas satu hari sebelum tugas dikumpulkan sebagai balas jasa atas kerja keras guru memberi penjelasan di kelas',
                'status' => 'fav',
            ],
            [
                'text' => 'Saya lebih memilih berhenti menggosip jika guru memberikan penjelasan di dalam kelas karena setiap penjelasan guru akan keluar dalam ujian',
                'status' => 'fav',
            ],
            [
                'text' => 'Menurut saya, jika ingin penyelesaian tugas tidak tertunda, maka awali lah dengan niat mau mencoba mengerjakan terlebih dahulu',
                'status' => 'fav',
            ],
            [
                'text' => 'Menurut saya, jika kita memiliki sebuah target pencapaian sebuah prestasi, maka kita akan terus berlatih untuk mencapai prestasi tersebut dengan sendirinya',
                'status' => 'fav',
            ],
            [
                'text' => 'Setiap malam, saya sudah mempersiapkan segala bahan sekolah',
                'status' => 'fav',
            ],
            [
                'text' => 'Kemauan saya dalam mengerjakan tugas hanya tergantung dari penilaian saya terhadap gurunya, apakah beliau enak cara mengajarnya atau tidak',
                'status' => 'unfav',
            ],
            [
                'text' => 'Saya tidak menuliskan jadwal pelajaran',
                'status' => 'unfav',
            ],
            [
                'text' => 'Saya merasa, saya merupakan siswa yang sangat sering menghiraukan (cuek) terhadap tugas belajar',
                'status' => 'unfav',
            ],
            [
                'text' => 'Saya selalu bersemangat dan yakin bisa menyelesaikan tugas yang diberikan guru',
                'status' => 'fav',
            ],
            [
                'text' => 'Saya benar-benar harus menjaga kesehatan di hari efektif sekolah agar tidak tertinggal dalam setiap pelajaran',
                'status' => 'fav',
            ],
            [
                'text' => 'Menurut saya, rutinitas membaca bab yang akan dibahas di dalam kelas nantinya merupakan hal yang utama harus dilakukan agar kita dapat mudah mengikuti penjelasan guru',
                'status' => 'fav',
            ],
            [
                'text' => 'Saya merasa, jika saya sulit menyelesaikan tugas dengan baik, itulah takdir saya',
                'status' => 'unfav',
            ],
            [
                'text' => 'Jika ada tugas dari guru, saya kurang mempedulikan untuk pergi ke perpustakaan guna mencari materi lainnya',
                'status' => 'unfav',
            ],
            [
                'text' => 'Saya cenderung tidak ingin melanjutkan mengerjakan ketika saya menemui kesulitan',
                'status' => 'unfav',
            ],
            [
                'text' => 'Saya lebih memilih bertanya kepada guru jika menemui kesulitan',
                'status' => 'fav',
           ]
            ];

            $data2 = [
                [
                    'text' => 'Awal guru masuk kelas, saya sudah menyiapkan segala buku dan peralatan tulis di meja',
                    'status' => 'fav',
                ],
                [
                    'text' => 'Saya rela menambah jam belajar, yang penting semua tugas, baik berat maupun ringan saya selesaikan tepat waktu',
                    'status' => 'fav',
                ],
                [
                    'text' => 'Jika ada PR dirumah yang tidak saya mengerti, saya pergi ke rumah teman saya yang pandai untuk meminta penjelasan agar tugas saya cepat selesai',
                    'status' => 'fav',
                ],
                [
                    'text' => 'Saya kesulitan mengerjakan tugas yang berat',
                    'status' => 'unfav',
                ],
                [
                    'text' => 'Jika ada tugas dari guru, saya memilih menunggu terlebih dahulu jawaban dari teman saya',
                    'status' => 'unfav',
                ],
                [
                    'text' => 'Saya suka berlomba dengan teman yang pintar (menurut saya) untuk dapat menyelesaikan tugas (baik ringan maupun sedang) dengan tepat waktu',
                    'status' => 'fav',
                ],
                [
                    'text' => 'Saat kenaikan kelas,  saya sudah mencari-cari buku pedoman dengan cara meminjam kakak kelas',
                    'status' => 'fav',
                ],
                [
                    'text' => 'Saya merasa lelah jika harus menggunakan waktu luang dengan belajar',
                    'status' => 'unfav',
                ],
                [
                    'text' => 'Jika di sela-sela mengerjakan PR orangtua meminta bantuan, saya akan segera membantu, setelah itu langsung kembali pada penyelesaian PR saya lagi',
                    'status' => 'fav',
                ],
                [
                    'text' => 'Jika ada teman datang ketika saya mengerjakan tugas untuk mengajak bermain, saya ikut bermain terlebih dahulu',
                    'status' => 'unfav',
                ],
                [
                    'text' => 'Saya kurang tertarik menyelesaikan tugas, jika orangtua tidak menjanjikan hadiah seperti biasanya',
                    'status' => 'unfav',
                ],
                [
                    'text' => 'Saya berusaha untuk berpikiran positif terhadap semua guru-guru saya agar saya senang pula dalam mengerjakan setiap tugas yang diberikan',
                    'status' => 'fav',
                ],
                [
                    'text' => 'Jika guru memberikan tugas diluar bab pembahasan, saya memilih tidak mengerjakannya',
                    'status' => 'unfav',
                ],
                [
                    'text' => 'Jika ada sarana wi-fi di sekolah saya, saya akan memanfaatkannya untuk mencari latihan-latihan soal',
                    'status' => 'fav',
                ],
                [
                    'text' => 'Jika tetangga ada suatu hajatan, saya membantu sekadarnya karena saya memiliki kewajiban menyelesaikan tugas sekolah',
                    'status' => 'fav',
                ],
                [
                    'text' => 'Jika saya tidak memiliki cukup biaya untuk membeli buku-buku referensi di toko-toko buku, saya menyiasati membaca banyak referensi buku untuk dicatat hal-hal yang penting saja',
                    'status' => 'fav',
                ],
                [
                    'text' => 'Jika ada waktu luang, saya tidak segan pergi ke perpustakaan untuk sekadar membaca buku',
                    'status' => 'fav',
                ],
                [
                    'text' => 'Padatnya aktivitas yang saya jalani membuat saya menunda pengerjaan tugas',
                    'status' => 'unfav',
                ],
                [
                    'text' => 'Walaupun guru memberikan tugas sangat sering, saya menyelesaikan tugas tepat pada waktunya',
                    'status' => 'fav',
                ],
                [
                    'text' => 'Saya mudah jenuh melihat soal-soal dari setiap tugas tersebut',
                    'status' => 'unfav',
                ],
            ];


            $data3 = [
                [
                    'text' => 'Menurut saya, hasil pembelajaran di sekolah adalah hal yang penting',
                    'status' => 'fav',
                ],
                [
                    'text' => 'Saya lebih memilih menyicil mengerjakan sebagian tugas yang berat',
                    'status' => 'fav',
                ],
                [
                    'text' => 'Kapanpun guru memberikan tugas, saya dapat menyelesaikan tugas tersebut',
                    'status' => 'fav',
                ],
                [
                    'text' => 'Menurut saya, belajar memiliki manfaat untuk masa depan, sehingga saya bertanya sebanyak mungkin kepada guru terkait pembelajaran yang diajarkan',
                    'status' => 'fav',
                ],
                [
                    'text' => 'Saya merasa kusulitan jika harus mendapatkan nilai di atas 7 dalam setiap mata pelajaran',
                    'status' => 'unfav',
                ],
                [
                    'text' => 'Saya sering kebingungan dengan tugas yang bermacam-macam',
                    'status' => 'unfav',
                ],
                [
                    'text' => 'Bagi saya, yang terpenting tugas selesai tanpa memperhatikan benar dan salahnya jawaban tersebut',
                    'status' => 'unfav',
                ],
                [
                    'text' => 'Sedikit atau banyak tugas yang diberikan guru, itu merupakan kesulitan bagi saya',
                    'status' => 'unfav',
                ],
                [
                    'text' => 'Jika saya menemui nomor soal yang sulit saat ujian, saya langsung beralih mengerjakan nomor soal lainnya yang lebih mudah terlebih dahulu',
                    'status' => 'fav',
                ],
                [
                    'text' => 'Saya sering sekali mendapatkan pujian dari guru atas benarnya pendapat-pendapat saya di kelas',
                    'status' => 'fav',
                ],
                [
                    'text' => 'Saat saya belajar, saya sulit berkonsentrasi yang hanya akan membuat waktu belajar tidak termanfaatkan dengan baik',
                    'status' => 'unfav',
                ],
                [
                    'text' => 'Jika membaca buku, saya pasti mencatat hal-hal yang penting dalam sebuah catatan tersendiri',
                    'status' => 'fav',
                ],
                [
                    'text' => 'Menurut saya, lebih baik mengerjakan tugas dengan usaha sendiri terlebih dahulu daripada hanya menunggu jawaban teman yang sekiranya bisa membantu',
                    'status' => 'fav',
                ],
                [
                    'text' => 'Saya berhenti belajar ketika melihat acara TV kesayangan saya',
                    'status' => 'unfav',
                ],
                [
                    'text' => 'Waktu belajar saya hanya sebentar',
                    'status' => 'unfav',
                ],
                [
                    'text' => 'Saya senang jika ada gangguan dari luar kelas, baik suara maupun gangguan dari orang lain saat pelajaran berlangsung',
                    'status' => 'unfav',
                ],
                [
                    'text' => 'Saya merasa, belajar merupakan rutinitas yang wajib saya lakukan setiap harinya sebagai seorang pelajar',
                    'status' => 'fav',
                ],
                [
                    'text' => 'Jika ada ujian, saya belajar di malam menjelang ujian dilaksanakan agar bahan tersebut tidak mudah saya lupakan',
                    'status' => 'unfav',
                ],
                [
                    'text' => 'Saat saya belajar, saya berusaha menambah jam belajar untuk menambah pengetahuan saya',
                    'status' => 'fav',
                ],
                [
                    'text' => 'Menurut saya, membaca hanyalah sebuah aktivitas yang tidak begitu penting',
                    'status' => 'unfav',
                ],
            ];

            $data4 = [
                [
                    'text' => 'Jika saya menemui kesulitan dalam mengerjakan tugas, saya meminta penjelasan kepada seseorang yang ahli di bidangnya',
                    'status' => 'fav',
                ],
                [
                    'text' => 'Jika tugas (PR) saya sudah selesai, saya merasa waktu belajar telah selesai',
                    'status' => 'unfav',
                ],
                [
                    'text' => 'Saya sering memberikan tanda-tanda tertentu (misalnya digarisbawahi) di buku untuk mempermudah saya dalam memahami pelajaran',
                    'status' => 'fav',
                ],
                [
                    'text' => 'Jika besok akan diadakan ujian, saya akan menambah jam belajar saya dari biasanya',
                    'status' => 'fav',
                ],
                [
                    'text' => 'Saya mendahulukan menonton tayangan yang tidak ada pemutaran ulang daripada kegiatan belajar',
                    'status' => 'unfav',
                ],
                [
                    'text' => 'Bagi saya, mengerjakan latihan soal-soal hanya akan membuang waktu bermain saya',
                    'status' => 'unfav',
                ],
                [
                    'text' => 'Saya belajar hanya menggunakan sumber buku pokok yang diwajibkan oleh guru',
                    'status' => 'unfav',
                ],
            ];

            $data5 = [...$data1,...$data2,...$data3,...$data4];

            foreach ($data5 as $key => $row) {
                Pertanyaan::create([
                    "survei_id"=>1,
                    "text" => $row["text"],
                    "status"=> $row["status"],
                ]);
            }

            SurveiGroup::create([
                "survei_id" =>1,
                "group_id" =>1
            ]);

            Kriteria::create([
                "survei_id" =>1,
                "text" => "Skor Tinggi",
                "nilaiMaks" => count($data5)*4,
                "nilaiMin" => 209.1965637,
                "style" => "hijau"
            ]);

            Kriteria::create([
                "survei_id" =>1,
                "text" => "Skor Sedang",
                "nilaiMaks" => 209.1965637 - 0.1,
                "nilaiMin" => 173.1474363,
                "style" => "kuning"
            ]);

            Kriteria::create([
                "survei_id" =>1,
                "text" => "Skor Rendah",
                "nilaiMaks" => 173.1474363 - 0.1,
                "nilaiMin" => 0.0,
                "style" => "merah"
            ]);

            Pengerjaan::create([
                "survei_id" =>1,
                "group_id" =>1,
                "user_id" => 2,
                "nilai" => 150.0,
            ]);


            $data6 = [
                [
                    'text' => 'Saya bahagia dengan kondisi fisik saya saat ini',
                    'status' => 'fav'
                ],
                [
                    'text' => 'Saya selalu menikmati setiap tugas yang diberikan oleh guru tanpa ada rasa jengkel',
                    'status' => 'fav'
                ],
                [
                    'text' => 'Saya senang terlibat dalam kegiatan OSIS, karena saya bisa memberikan sumbangan untuk kemajuan sekolah',
                    'status' => 'fav'
                ],
                [
                    'text' => 'Saya bisa mencairkan suasana kelompok yang dingin akibat adanya kesalahpahaman antara anggota kelompok',
                    'status' => 'fav'
                ],
                [
                    'text' => 'Ketika teman saya sedang memiliki masalah saya akan mencoba untuk tidak mendekatinya',
                    'status' => 'unfav'
                ],
                [
                    'text' => 'Saya akan merasa sangat bersalah ketika mendapatkan nilai ulangan mata pelajaran favorit saya di bawah KKM (Kriteria Ketuntasan Minimum)',
                    'status' => 'unfav'
                ],
                [
                    'text' => 'Saya bisa menerima kekurangan fisik yang ada pada diri saya dengan mengagumi kekurangan itu',
                    'status' => 'fav'
                ],
                [
                    'text' => 'Saya tidak terima jika saat musyawarah kelas, pendapat saya ditolak teman-teman',
                    'status' => 'unfav'
                ],
                [
                    'text' => 'Saya menerima kapanpun nyawa akan diambil oleh Tuhan karena saya tahu nyawa adalah titipan-Nya',
                    'status' => 'fav'
                ],
                [
                    'text' => 'Saya akan merasa sangat sedih jika suatu saat nanti teman terbaik atau sahabat saya tidak melanjutkan ke Perguruan Tinggi yang sama dengan saya',
                    'status' => 'unfav'
                ],
                [
                    'text' => 'Saya akan menerima saran perbaikan dari guru bidang studi terkait tugas yang saya kerjakan',
                    'status' => 'fav'
                ],
                [
                    'text' => 'Saya tidak menerima alasan apapun jika mungkin siap jika suatu saat nanti kekasih saya akan meninggalkan saya',
                    'status' => 'unfav'
                ],
                [
                    'text' => 'Saya takut teman-teman menganggap kuper (kurang pergaulan) dan tidak laku jika saya tidak punya pacar',
                    'status' => 'unfav'
                ],
                [
                    'text' => 'Saya akan melaporkan guru saya jika saya mendapatkan nilai jelek',
                    'status' => 'unfav'
                ],
                [
                    'text' => 'Dia (orang yang saya taksir) itu sudah jelas akan menolak saat saya mengungkapkan perasaan cinta saya kepadanya',
                    'status' => 'unfav'
                ],
                [
                    'text' => 'Saya bukan apa-apa tanpa pacar saya',
                    'status' => 'unfav'
                ],
                [
                    'text' => 'Ketika nilai saya di bawah KKM, saya akan memperbaikinya pada ulangan mendatang',
                    'status' => 'fav'
                ],
                [
                    'text' => 'Jika orang lain bisa membeli HP baru seperti yang saya inginkan, maka saya akan menabung untuk membelinya',
                    'status' => 'fav'
                ],
                [
                    'text' => 'Saya takut dimarahi guru saya jika saya salah dalam menyelesaikan tugas sekolah',
                    'status' => 'unfav'
                ],
                [
                    'text' => 'Saya lebih memilih untuk menghindari teman yang suka mencemooh orang lain, daripada harus menegurnya dan mendapatkan cemoohannya juga',
                    'status' => 'unfav'
                ],
                [
                    'text' => 'Saat tes masuk perguruan Tinggi nanti, saya akan mencoba mendaftar di perguruan tinggi favorit saya, meskipun saya tau kesempatannya sangat sedikit',
                    'status' => 'fav'
                ],
                [
                    'text' => 'Saat ingin membeli gadget baru, saya akan memberanikan diri untuk bilang ke orangtua tidak masalah jika nanti orangtua menolak yang penting saya sudah berusaha meminta',
                    'status' => 'fav'
                ]
            ];

            $data7 = [
                [
                    'text' => 'Saya tidak akan mundur jika harus bertanding pada olimpiade dengan sekolah lain yang lebih favorit. Kalah menang itu sudah biasa.',
                    'status' => 'fav'
                ],
                [
                    'text' => 'Saya akan meminta maaf jika saya salah sangka kepada teman saya',
                    'status' => 'fav'
                ],
                [
                    'text' => 'Saya akan mengikuti program remedial karena nilai saya di bawah KKM',
                    'status' => 'fav'
                ],
                [
                    'text' => 'Jika saya melanggar tata tertib sekolah, saya lebih memilih menyembunyikannya daripada saya harus mendapatkan sanksi yang telah ditentukan pihak sekolah',
                    'status' => 'unfav'
                ],
                [
                    'text' => 'Saya akan sangat marah jika ada orang lain yang menghina saya',
                    'status' => 'unfav'
                ],
                [
                    'text' => 'Saya bisa menahan amarah saya saat orang lain menyindir atau memaki saya',
                    'status' => 'fav'
                ],
                [
                    'text' => 'Saya salah memilih jurusan sehingga tidak bisa belajar dengan maksimal',
                    'status' => 'unfav'
                ],
                [
                    'text' => 'Saya lebih memilih diam saat orang lain menghujat dan mencemooh saya',
                    'status' => 'unfav'
                ],
                [
                    'text' => 'Saya memiliki gambaran yang jelas tentang cita-cita saya kelak',
                    'status' => 'fav'
                ],
                [
                    'text' => 'Saya mengikuti salah satu kegiatan ekstrakurikuler di sekolah yang sesuai dengan cita-cita saya',
                    'status' => 'fav'
                ],
                [
                    'text' => 'Saya kecewa saat teman-teman tidak menyetujui pendapat saya',
                    'status' => 'unfav'
                ],
                [
                    'text' => 'Saya menerima segala kritikan tentang diri saya untuk kebaikan diri saya sendiri',
                    'status' => 'fav'
                ],
                [
                    'text' => 'Yang menyebabkan prestasi kelompok saya gagal karena teman saya selalu salah dalam menjelaskan materinya',
                    'status' => 'unfav'
                ],
                [
                    'text' => 'Teman sebangku saya selalu saja mencampuri urusan saya, pasti nanti di belakang saya akan menjelek-jelekkan saya',
                    'status' => 'unfav'
                ],
                [
                    'text' => 'Saya harus menjadi siswa terbaik dan teladan di kelas saya',
                    'status' => 'unfav'
                ],
                [
                    'text' => 'Saya akan belajar lebih giat lagi untuk meningkatkan kemampuan saya dalam berbahasa Inggris',
                    'status' => 'fav'
                ],
                [
                    'text' => 'Saya akan mengerjakan tugas sesuai dengan pembagian tugas masing-masing anggota kelompok',
                    'status' => 'fav'
                ],
                [
                    'text' => 'Jika pemikiran saya tidak sepaham dengan pemikiran anggota kelompok, maka saya akan bekerja sendiri',
                    'status' => 'unfav'
                ],
                [
                    'text' => 'Jika saya merasa tidak cocok dengan anggota kelompok, maka saya akan mencari kelompok lain',
                    'status' => 'unfav'
                ],
                [
                    'text' => 'Saya akan merasa sakit hati dan kecewa jika mengingat masa lalu saya',
                    'status' => 'unfav'
                ],
                [
                    'text' => 'Saya kecewa dengan ketidakmampuan saya saat berbicara di depan publik',
                    'status' => 'unfav'
                ],
                [
                    'text' => 'Mengapa saya terlahir dari keluarga yang tidak mampu?',
                    'status' => 'unfav'
                ],
                [
                    'text' => 'Dengan kekurangan pada fisik saya seperti ini, saya masih bisa membuat diri saya dan orang lain bahagia',
                    'status' => 'fav'
                ],
                [
                    'text' => 'Inilahsaya dengan segala keterbatasan saya, saya tetap merasa bahagia',
                    'status' => 'fav'
                ],
                [
                    'text' => 'Saya akan mengasah dan melatih hobi saya dari sekarang siap atau akan berguna untuk bekal di masa yang akan datang',
                    'status' => 'fav'
                ],
                [
                    'text' => 'Saya tidak mau ambil pusing memikirkan cara untuk lulus nanti yang penting sekarang saya bisa mendapatkan nilai yang baik dengan cara apapun.',
                    'status' => 'unfav'
                ],
                [
                    'text' => 'Saya akan membuat contekan sebelum ulangan dimulai agar mendapatkan nilai yang bagus sehingga saya tidak ada kena remedial',
                    'status' => 'unfav'
                ],
                [
                    'text' => 'Saya paham jika saya harus mulai belajar dari sekarang untuk mempermudah saya masuk perguruan tinggi',
                    'status' => 'fav'
                ]
            ];

            $data8 = [...$data6,...$data7];
            foreach ($data8 as $key => $row) {
                Pertanyaan::create([
                    "survei_id"=>2,
                    "text" => $row["text"],
                    "status"=> $row["status"],
                ]);
            }


            SurveiGroup::create([
                "survei_id" =>2,
                "group_id" =>1
            ]);

            Kriteria::create([
                "survei_id" =>2,
                "text" => "Pribadi Sehat",
                "nilaiMaks" => count($data8)*4,
                "nilaiMin" => 159.0,
                "style" => "hijau"
            ]);

            Kriteria::create([
                "survei_id" =>2,
                "text" => "Pribadi Tidak Sehat",
                "nilaiMaks" => 159.0 - 0.1,
                "nilaiMin" => 0.0,
                "style" => "merah"
            ]);

            Pengerjaan::create([
                "survei_id" =>2,
                "group_id" =>1,
                "user_id" => 2,
                "nilai" => 160.0,
            ]);




    }
}
