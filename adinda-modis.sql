-- Adminer 4.8.1 PostgreSQL 10.22 dump

DROP TABLE IF EXISTS "kurikulum";
DROP SEQUENCE IF EXISTS kurikulum_id_seq;
CREATE SEQUENCE kurikulum_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 START 1 CACHE 1;

CREATE TABLE "public"."kurikulum" (
    "id" integer DEFAULT nextval('kurikulum_id_seq') NOT NULL,
    "hambatan_id" integer NOT NULL,
    "nama" character varying(256) NOT NULL,
    "is_aktif" boolean DEFAULT true NOT NULL,
    CONSTRAINT "kurikulum_pkey" PRIMARY KEY ("id")
) WITH (oids = false);

CREATE INDEX "kurikulum_hambatan_id" ON "public"."kurikulum" USING btree ("hambatan_id");

TRUNCATE "kurikulum";
INSERT INTO "kurikulum" ("id", "hambatan_id", "nama", "is_aktif") VALUES
(1,	2,	'AUTISME',	't');

DROP TABLE IF EXISTS "kurikulum_aspek";
DROP SEQUENCE IF EXISTS kurikulum_aspek_id_seq;
CREATE SEQUENCE kurikulum_aspek_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 START 4 CACHE 1;

CREATE TABLE "public"."kurikulum_aspek" (
    "id" integer DEFAULT nextval('kurikulum_aspek_id_seq') NOT NULL,
    "kurikulum_id" integer NOT NULL,
    "urutan" integer NOT NULL,
    "nama" character varying(256) NOT NULL,
    CONSTRAINT "kurikulum_aspek_pkey" PRIMARY KEY ("id")
) WITH (oids = false);

CREATE INDEX "kurikulum_aspek_kurikulum_id" ON "public"."kurikulum_aspek" USING btree ("kurikulum_id");

TRUNCATE "kurikulum_aspek";
INSERT INTO "kurikulum_aspek" ("id", "kurikulum_id", "urutan", "nama") VALUES
(2,	1,	2,	'MOTORIK HALUS'),
(1,	1,	1,	'ATTENTION / PERHATIAN'),
(3,	1,	3,	'LITERACY'),
(4,	1,	4,	'NARRATION / CERITA');

DROP TABLE IF EXISTS "kurikulum_indikator";
DROP SEQUENCE IF EXISTS kurikulum_indikator_id_seq;
CREATE SEQUENCE kurikulum_indikator_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 START 28 CACHE 1;

CREATE TABLE "public"."kurikulum_indikator" (
    "id" integer DEFAULT nextval('kurikulum_indikator_id_seq') NOT NULL,
    "kurikulum_kegiatan_id" integer NOT NULL,
    "urutan" integer NOT NULL,
    "nama" text NOT NULL,
    CONSTRAINT "kurikulum_indikator_pkey" PRIMARY KEY ("id")
) WITH (oids = false);

CREATE INDEX "kurikulum_indikator_kurikulum_kegiatan_id" ON "public"."kurikulum_indikator" USING btree ("kurikulum_kegiatan_id");

TRUNCATE "kurikulum_indikator";
INSERT INTO "kurikulum_indikator" ("id", "kurikulum_kegiatan_id", "urutan", "nama") VALUES
(1,	1,	1,	'Saat disajikan papan “first then”, anak mampu bersama guru memilih kegiatan pertama dan selanjutnya satu kegiatan yang memotivasi bagi anak.'),
(2,	1,	2,	'Mampu ikut serta pada tugas yang diberikan guru sebelum beralih ke kegiatan yang memotivasinya'),
(3,	1,	3,	'Saat disajikan papan “first then”, anak mampu ikut serta melakukan dua kegiatan sebelum beralih kekegiatan yang memotivasinya'),
(4,	1,	4,	'Saat disajikan papan “first then”, anak mampu bersama guru memilih kegiatan pertama dan selanjutnya satu kegiatan yang memotivasi bagi anak, selanjutnya mengambil gambar kegiatan yang sudah dilakukan untuk dimasukkan di kotak “selesai”'),
(5,	1,	5,	'Saat disajikan papan “first then”, anak mampu ikut serta melakukan dua kegiatan sebelum beralih ke kegiatan yang memotivasinya dan selanjutnya mengambil gambar kegiatan yang sudah dilakukan untuk dimasukkan di kotak “selesai”'),
(6,	2,	1,	'Saat disajikan visual schedule empat kegiatan, anak mampu ikut serta pada tugas yang diberikan Terapis minimal empat kegiatan sebelum beralih ke kegiatan yang memotivasinya, lalu aktivitas yang sudah dilakukannya dimasukkan di kotak “selesai”
(prompt tidak boleh lebih dari satukali)'),
(7,	2,	2,	'Saat disajikan visual schedule enam kegiatan (dua kegiatan yang harus dilakukan baru ke satu kegiatan memotivasi tidak lebih dari dua menit), anak mampu tetap berada di ruangan/ work area dan mengerjakan kegiatan. Usai mengerjakan anak akan meletakkan di kotak “finish” (tidak lebih dari satu bantuan/prompt)'),
(8,	2,	3,	'Saat disajikan visual schedule enam kegiatan (tiga kegiatan yang harus dilakukan baru ke satu kegiatan memotivasi tidak lebih dari dua menit), anak mampu tetap berada di ruangan/ work area dan mengerjakan kegiatan. Usai mengerjakan anak meletakkan di kotak “finish” (tidak lebih dari satu bantuan/prompt)'),
(9,	2,	4,	'Saat disajikan visual schedule enam kegiatan (lima kegiatan yang harus dilakukan baru ke satu kegiatan memotivasi tidak lebih dari dua menit), anak mampu tetap berada di ruangan/ work area dan mengerjakan kegiatan. Usai mengerjakan anak akan meletakkan di kotak “finish” (tidak lebih dari satu bantuan/prompt)'),
(10,	2,	5,	'Saat disajikan visual schedule delapan kegiatan (tujuh kegiatan yang harus dilakukan baru ke satu kegiatan memotivasi tidak lebih dari dua menit), anak mampu tetap berada di ruangan/ work area dan mengerjakan kegiatan. Usai mengerjakan anak akan meletakkan di kotak “finish” (tidak lebih dari satu bantuan/prompt)'),
(11,	3,	1,	'Mampu menggunakan kuas cat usai diberi contoh'),
(12,	3,	2,	'Mampu menggulung plastisin'),
(13,	3,	3,	'Menempatkan pasak di plastisin'),
(14,	3,	4,	'Menempatkan tusuk lidi di plastisin'),
(15,	4,	1,	'Mampu menggunakan kuas cat usai diberi contoh'),
(16,	4,	2,	'Mampu menggulung plastisin'),
(17,	4,	3,	'Menempatkan pasak di plastisin'),
(18,	4,	4,	'Menempatkan tusuk lidi di plastisin'),
(19,	5,	1,	'Mampu menggunakan kuas cat usai diberi contoh'),
(20,	5,	2,	'Mampu menggulung plastisin'),
(21,	5,	3,	'Menempatkan pasak di plastisin'),
(22,	5,	4,	'Menempatkan tusuk lidi di plastisin'),
(23,	6,	1,	'Mampu Duduk di bantal'),
(24,	6,	2,	'Mampu Duduk di foam bentuk'),
(25,	6,	3,	'Mampu Duduk di holahop'),
(26,	7,	1,	'Mampu Duduk di bantal'),
(27,	7,	2,	'Mampu Duduk di foam bentuk'),
(28,	7,	3,	'Mampu Duduk di holahop');

DROP TABLE IF EXISTS "kurikulum_kegiatan";
DROP SEQUENCE IF EXISTS kurikulum_kegiatan_id_seq;
CREATE SEQUENCE kurikulum_kegiatan_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 START 8 CACHE 1;

CREATE TABLE "public"."kurikulum_kegiatan" (
    "id" integer DEFAULT nextval('kurikulum_kegiatan_id_seq') NOT NULL,
    "kurikulum_target_id" integer NOT NULL,
    "urutan" integer NOT NULL,
    "nama" text NOT NULL,
    CONSTRAINT "kurikulum_kegiatan_pkey" PRIMARY KEY ("id")
) WITH (oids = false);

CREATE INDEX "kurikulum_kegiatan_kurikulum_target_id" ON "public"."kurikulum_kegiatan" USING btree ("kurikulum_target_id");

TRUNCATE "kurikulum_kegiatan";
INSERT INTO "kurikulum_kegiatan" ("id", "kurikulum_target_id", "urutan", "nama") VALUES
(1,	1,	1,	'Memahami konsep “first then”'),
(2,	2,	1,	'Memahami konsep visual schedule/time table'),
(3,	3,	1,	'Meniru satu tindakan dari kegiatan ketrampilan sesudah diberi contoh (tidak lebih dari satu prompt fisik)'),
(4,	3,	2,	'Mengulang satu tindakan ketrampilan sesudah diberi contoh'),
(5,	3,	3,	'Mengulang satu tindakan ketrampilan sesudah diberi contoh dan mengulang di waktu/ sesi selanjutnya'),
(8,	4,	3,	'Anak akan belajar secara mandiri duduk di atas peralatan (duduk dan berdiri dari bantalan/karpet/matras) atau saat menggunakan alat (alas duduk untuk sensory) saat ikut serta dalam area karpet saat diberikan bantuan oleh terapis'),
(6,	4,	1,	'Anak akan belajar duduk di  atas peralatan (duduk dan berdiri dari bantalan/karpet/matras) atau saat menggunakan alat (alas duduk untuk sensory) saat ikut serta dalam area karpet saat diberikan bantuan oleh terapis'),
(7,	4,	2,	'Anak akan diarahkan /diperintahkan belajar duduk di atas peralatan (duduk dan berdiri dari bantalan/karpet/matras) atau saat menggunakan alat (alas duduk untuk sensory) saat ikut serta dalam area karpet saat diberikan bantuan oleh terapis');

DROP TABLE IF EXISTS "kurikulum_target";
DROP SEQUENCE IF EXISTS kurikulum_target_id_seq;
CREATE SEQUENCE kurikulum_target_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 START 4 CACHE 1;

CREATE TABLE "public"."kurikulum_target" (
    "id" integer DEFAULT nextval('kurikulum_target_id_seq') NOT NULL,
    "kurikulum_aspek_id" integer NOT NULL,
    "urutan" integer NOT NULL,
    "nama" character varying(256) NOT NULL,
    "deskripsi" text,
    CONSTRAINT "kurikulum_target_pkey" PRIMARY KEY ("id")
) WITH (oids = false);

CREATE INDEX "kurikulum_target_kurikulum_aspek_id" ON "public"."kurikulum_target" USING btree ("kurikulum_aspek_id");

TRUNCATE "kurikulum_target";
INSERT INTO "kurikulum_target" ("id", "kurikulum_aspek_id", "urutan", "nama", "deskripsi") VALUES
(1,	1,	1,	'Target 1',	'a. Berpartisipasi/turut serta dalam kegiatan yang dilakukan dengan Guru/Tx/Dewasa
b. Meningkatkan kemampuan XXX untuk turut serta lebih lama dalam perhatian dan tugas'),
(2,	1,	2,	'Target 2',	'a. Berpartisipasi/turut serta dalam kegiatan yang dilakukan dengan Guru/Tx/Dewasa
b. Meningkatkan kemampuan XXX untuk turut serta lebih lama dalam perhatian dan tugas'),
(3,	1,	3,	'Target 3',	'Anak akan meningkatkan kemampuannya untuk ikut serta/berpartisipasi selama kegiatan craft'),
(4,	1,	4,	'Target 4',	'Anak akan belajar menggunakan strategi yang sesuai untuk mendukung perhatian di atas matras/karpet');

DROP TABLE IF EXISTS "m_agama";
DROP SEQUENCE IF EXISTS m_agama_id_seq;
CREATE SEQUENCE m_agama_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 START 1 CACHE 1;

CREATE TABLE "public"."m_agama" (
    "id" integer DEFAULT nextval('m_agama_id_seq') NOT NULL,
    "nama" character varying(256) NOT NULL,
    CONSTRAINT "m_agama_pkey" PRIMARY KEY ("id")
) WITH (oids = false);

TRUNCATE "m_agama";
INSERT INTO "m_agama" ("id", "nama") VALUES
(1,	'Islam');

DROP TABLE IF EXISTS "m_assessment";
DROP SEQUENCE IF EXISTS m_assessment_id_seq;
CREATE SEQUENCE m_assessment_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 START 2 CACHE 1;

CREATE TABLE "public"."m_assessment" (
    "id" integer DEFAULT nextval('m_assessment_id_seq') NOT NULL,
    "nama" character varying(256) NOT NULL,
    CONSTRAINT "m_assessment_pkey" PRIMARY KEY ("id")
) WITH (oids = false);

TRUNCATE "m_assessment";
INSERT INTO "m_assessment" ("id", "nama") VALUES
(1,	'Hasil Assessment'),
(2,	'Tes Pendengaran');

DROP TABLE IF EXISTS "m_hambatan";
DROP SEQUENCE IF EXISTS m_hambatan_id_seq;
CREATE SEQUENCE m_hambatan_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 START 2 CACHE 1;

CREATE TABLE "public"."m_hambatan" (
    "id" integer DEFAULT nextval('m_hambatan_id_seq') NOT NULL,
    "jenis_hambatan_id" integer NOT NULL,
    "nama" character varying(256) NOT NULL,
    CONSTRAINT "m_hambatan_pkey" PRIMARY KEY ("id")
) WITH (oids = false);

CREATE INDEX "m_hambatan_jenis_hambatan_id" ON "public"."m_hambatan" USING btree ("jenis_hambatan_id");

TRUNCATE "m_hambatan";
INSERT INTO "m_hambatan" ("id", "jenis_hambatan_id", "nama") VALUES
(1,	1,	'Cerebral palsy'),
(2,	3,	'Autisme');

DROP TABLE IF EXISTS "m_jabatan";
DROP SEQUENCE IF EXISTS m_jabatan_id_seq;
CREATE SEQUENCE m_jabatan_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 START 6 CACHE 1;

CREATE TABLE "public"."m_jabatan" (
    "id" integer DEFAULT nextval('m_jabatan_id_seq') NOT NULL,
    "nama" character varying(256) NOT NULL,
    "kode" character varying(3) NOT NULL,
    CONSTRAINT "m_jabatan_pkey" PRIMARY KEY ("id")
) WITH (oids = false);

TRUNCATE "m_jabatan";
INSERT INTO "m_jabatan" ("id", "nama", "kode") VALUES
(2,	'Terapsi Wicara',	'TW'),
(3,	'Terapis Okupasi',	'OT'),
(4,	'Fisioterapis',	'FT'),
(5,	'Key Terapis',	'KT'),
(6,	'Terapis',	'T'),
(1,	'Psikolog',	'Psi');

DROP TABLE IF EXISTS "m_jenis_hambatan";
DROP SEQUENCE IF EXISTS m_jenis_hambatan_id_seq;
CREATE SEQUENCE m_jenis_hambatan_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 START 4 CACHE 1;

CREATE TABLE "public"."m_jenis_hambatan" (
    "id" integer DEFAULT nextval('m_jenis_hambatan_id_seq') NOT NULL,
    "nama" character varying(256) NOT NULL,
    CONSTRAINT "m_jenis_hambatan_pkey" PRIMARY KEY ("id")
) WITH (oids = false);

TRUNCATE "m_jenis_hambatan";
INSERT INTO "m_jenis_hambatan" ("id", "nama") VALUES
(1,	'Disabilitas Fisik'),
(2,	'Disabilitas Intelektual'),
(3,	'Disabilitas Mental'),
(4,	'Disabilitas Sensorik');

DROP TABLE IF EXISTS "m_jenis_kelamin";
DROP SEQUENCE IF EXISTS m_jenis_kelamin_id_seq;
CREATE SEQUENCE m_jenis_kelamin_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 START 2 CACHE 1;

CREATE TABLE "public"."m_jenis_kelamin" (
    "id" integer DEFAULT nextval('m_jenis_kelamin_id_seq') NOT NULL,
    "nama" character varying(256) NOT NULL,
    CONSTRAINT "m_jenis_kelamin_pkey" PRIMARY KEY ("id")
) WITH (oids = false);

TRUNCATE "m_jenis_kelamin";
INSERT INTO "m_jenis_kelamin" ("id", "nama") VALUES
(1,	'Laki-Laki'),
(2,	'Perempuan');

DROP TABLE IF EXISTS "m_jenis_layanan";
DROP SEQUENCE IF EXISTS m_jenis_layanan_id_seq;
CREATE SEQUENCE m_jenis_layanan_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 START 4 CACHE 1;

CREATE TABLE "public"."m_jenis_layanan" (
    "id" integer DEFAULT nextval('m_jenis_layanan_id_seq') NOT NULL,
    "nama" character varying(256) NOT NULL,
    CONSTRAINT "m_jenis_layanan_pkey" PRIMARY KEY ("id")
) WITH (oids = false);

TRUNCATE "m_jenis_layanan";
INSERT INTO "m_jenis_layanan" ("id", "nama") VALUES
(1,	'Pengayaan'),
(2,	'Reguler'),
(3,	'Transisi'),
(4,	'Pendampingan');

DROP TABLE IF EXISTS "m_tahun_ajar";
DROP SEQUENCE IF EXISTS m_tahun_ajar_id_seq;
CREATE SEQUENCE m_tahun_ajar_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 START 2 CACHE 1;

CREATE TABLE "public"."m_tahun_ajar" (
    "id" integer DEFAULT nextval('m_tahun_ajar_id_seq') NOT NULL,
    "nama" character varying(256) NOT NULL,
    "tanggal_mulai" date NOT NULL,
    "tanggal_selesai" date NOT NULL,
    CONSTRAINT "m_tahun_ajar_pkey" PRIMARY KEY ("id")
) WITH (oids = false);

TRUNCATE "m_tahun_ajar";
INSERT INTO "m_tahun_ajar" ("id", "nama", "tanggal_mulai", "tanggal_selesai") VALUES
(1,	'JANUARI - JUNI 2023',	'2023-01-01',	'2023-06-30'),
(2,	'JULI - DESEMBER 2023',	'2023-07-01',	'2023-12-31');

DROP TABLE IF EXISTS "matriks_perencanaan";
DROP SEQUENCE IF EXISTS matriks_perencanaan_id_seq;
CREATE SEQUENCE matriks_perencanaan_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 START 1 CACHE 1;

CREATE TABLE "public"."matriks_perencanaan" (
    "id" integer DEFAULT nextval('matriks_perencanaan_id_seq') NOT NULL,
    "nama" character varying(256) NOT NULL,
    "hambatan_id" integer NOT NULL,
    "is_aktif" boolean DEFAULT true NOT NULL,
    CONSTRAINT "matriks_perencanaan_pkey" PRIMARY KEY ("id")
) WITH (oids = false);

CREATE INDEX "matriks_perencanaan_hambatan_id" ON "public"."matriks_perencanaan" USING btree ("hambatan_id");

TRUNCATE "matriks_perencanaan";
INSERT INTO "matriks_perencanaan" ("id", "nama", "hambatan_id", "is_aktif") VALUES
(1,	'Autisme',	2,	't');

DROP TABLE IF EXISTS "matriks_perencanaan_aspek";
DROP SEQUENCE IF EXISTS matriks_perencanaan_aspek_id_seq;
CREATE SEQUENCE matriks_perencanaan_aspek_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 START 5 CACHE 1;

CREATE TABLE "public"."matriks_perencanaan_aspek" (
    "id" integer DEFAULT nextval('matriks_perencanaan_aspek_id_seq') NOT NULL,
    "matriks_perencanaan_id" integer NOT NULL,
    "urutan" integer NOT NULL,
    "nama" character varying(256) NOT NULL,
    CONSTRAINT "matriks_perencanaan_aspek_pkey" PRIMARY KEY ("id")
) WITH (oids = false);

CREATE INDEX "matriks_perencanaan_aspek_matriks_perencanaan_id" ON "public"."matriks_perencanaan_aspek" USING btree ("matriks_perencanaan_id");

TRUNCATE "matriks_perencanaan_aspek";
INSERT INTO "matriks_perencanaan_aspek" ("id", "matriks_perencanaan_id", "urutan", "nama") VALUES
(2,	1,	2,	'Interaksi Sosial'),
(3,	1,	3,	'Perilaku Berulang & Minat Terbatas'),
(4,	1,	4,	'Pemrosesan Indrawi'),
(5,	1,	5,	'Pemrosesan Informasi / Gaya Belajar'),
(1,	1,	1,	'Komunikasi');

DROP TABLE IF EXISTS "matriks_perencanaan_item";
DROP SEQUENCE IF EXISTS matriks_perencanaan_item_id_seq;
CREATE SEQUENCE matriks_perencanaan_item_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 START 9 CACHE 1;

CREATE TABLE "public"."matriks_perencanaan_item" (
    "id" integer DEFAULT nextval('matriks_perencanaan_item_id_seq') NOT NULL,
    "matriks_perencanaan_aspek_id" integer NOT NULL,
    "matriks_perencanaan_item_id" integer,
    "urutan" integer NOT NULL,
    "nama" text NOT NULL,
    "is_pertanyaan" boolean DEFAULT true NOT NULL,
    CONSTRAINT "matriks_perencanaan_item_pkey" PRIMARY KEY ("id")
) WITH (oids = false);

CREATE INDEX "matriks_perencanaan_item_matriks_perencanaan_aspek_id" ON "public"."matriks_perencanaan_item" USING btree ("matriks_perencanaan_aspek_id");

CREATE INDEX "matriks_perencanaan_item_matriks_perencanaan_item_id" ON "public"."matriks_perencanaan_item" USING btree ("matriks_perencanaan_item_id");

TRUNCATE "matriks_perencanaan_item";
INSERT INTO "matriks_perencanaan_item" ("id", "matriks_perencanaan_aspek_id", "matriks_perencanaan_item_id", "urutan", "nama", "is_pertanyaan") VALUES
(2,	1,	NULL,	2,	'Komunikasi Ekspresif',	'f'),
(3,	1,	NULL,	3,	'Komunikasi Reseptif',	'f'),
(4,	1,	NULL,	4,	'Pragmatisme',	'f'),
(1,	1,	NULL,	1,	'Keterangan Pendahuluan',	'f'),
(6,	1,	1,	2,	'Perhatian bersama melihat ke arah Anda menunjuk dan berbagi kesenangan',	't'),
(7,	1,	1,	3,	'Menunjuk',	't'),
(8,	1,	1,	4,	'Meraih perhatian',	't'),
(9,	1,	1,	5,	'Peniruan',	't'),
(5,	1,	1,	1,	'Kontak mata',	't');

DROP TABLE IF EXISTS "p_migration";
CREATE TABLE "public"."p_migration" (
    "version" character varying(180) NOT NULL,
    "apply_time" integer,
    CONSTRAINT "p_migration_pkey" PRIMARY KEY ("version")
) WITH (oids = false);

TRUNCATE "p_migration";
INSERT INTO "p_migration" ("version", "apply_time") VALUES
('m000000_000000_base',	1694404472),
('m160112_125146_p_user',	1694404472),
('m160112_130826_p_role',	1694404472),
('m160112_132000_p_user_role',	1694404472);

DROP TABLE IF EXISTS "p_role";
DROP SEQUENCE IF EXISTS p_role_id_seq;
CREATE SEQUENCE p_role_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 START 9 CACHE 1;

CREATE TABLE "public"."p_role" (
    "id" integer DEFAULT nextval('p_role_id_seq') NOT NULL,
    "role_name" character varying(255) NOT NULL,
    "role_description" character varying(255) NOT NULL,
    "menu_path" character varying(255),
    "home_url" character varying(255),
    "repo_path" character varying(255),
    "jabatan_id" integer,
    CONSTRAINT "p_role_pkey" PRIMARY KEY ("id")
) WITH (oids = false);

TRUNCATE "p_role";
INSERT INTO "p_role" ("id", "role_name", "role_description", "menu_path", "home_url", "repo_path", "jabatan_id") VALUES
(1,	'dev',	'IT - Developer',	'',	'/docs/welcome',	'',	NULL),
(2,	'admin',	'Admin',	'app.menus.admin',	'admin/beranda',	'admin',	NULL),
(3,	'terapis',	'Terapis',	'',	'/docs/welcome',	'pegawai',	6),
(4,	'key_terapis',	'Key Terapis',	'',	'/docs/welcome',	'pegawai',	5),
(5,	'psikolog',	'Psikolog',	'',	'/docs/welcome',	'pegawai',	1),
(6,	'terapis_wicara',	'Terapis Wicara',	'',	'/docs/welcome',	'pegawai',	2),
(7,	'terapis_okupasi',	'Terapis Okupasi',	'',	'/docs/welcome',	'pegawai',	3),
(8,	'fisioterapis',	'Fisioterapis',	'',	'/docs/welcome',	'pegawai',	4),
(9,	'anak',	'Anak',	'',	'/docs/welcome',	'anak',	NULL);

DROP TABLE IF EXISTS "p_user";
DROP SEQUENCE IF EXISTS p_user_id_seq;
CREATE SEQUENCE p_user_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 START 10 CACHE 1;

CREATE TABLE "public"."p_user" (
    "id" integer DEFAULT nextval('p_user_id_seq') NOT NULL,
    "email" character varying(255) NOT NULL,
    "username" character varying(255) NOT NULL,
    "password" character varying(255) NOT NULL,
    "last_login" timestamp,
    "is_deleted" boolean,
    "user_token" character varying(255),
    "pegawai_id" integer,
    CONSTRAINT "p_user_pkey" PRIMARY KEY ("id")
) WITH (oids = false);

CREATE INDEX "p_user_pegawai_id" ON "public"."p_user" USING btree ("pegawai_id");

TRUNCATE "p_user";
INSERT INTO "p_user" ("id", "email", "username", "password", "last_login", "is_deleted", "user_token", "pegawai_id") VALUES
(9,	'sample@sample.com',	'101010',	'$2y$10$U1vG4myxNb6G9ZtxMQ/uROi9PMZVr1QrWy0XAnwSuAHdn0txINRwG',	'2023-09-13 09:37:26',	NULL,	NULL,	4),
(10,	'sample@sample.com',	'202020',	'$2y$10$dc08/oQrdTCIhWLvLhFe2u0PWeV1FGVyviDyV632Q4a0YyEIWkCd2',	'2023-09-13 09:37:44',	NULL,	NULL,	5),
(1,	'dev@dev.com',	'dev',	'$2y$10$H8yqYKhnv/ogkyXYVR.dvudf0ai9do2eiWpy2fItC.lPbVSzl9IHK',	'2023-09-14 08:43:45',	'f',	NULL,	NULL),
(2,	'mimin@dev.com',	'mimin',	'$2y$10$4zgmJgjTisWjft9v.ASrNedY222Gan4AZj7sm0hCga7Dz6cqUkNlK',	'2023-09-15 10:38:47',	NULL,	NULL,	NULL);

DROP TABLE IF EXISTS "p_user_role";
DROP SEQUENCE IF EXISTS p_user_role_id_seq;
CREATE SEQUENCE p_user_role_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 START 17 CACHE 1;

CREATE TABLE "public"."p_user_role" (
    "id" integer DEFAULT nextval('p_user_role_id_seq') NOT NULL,
    "user_id" integer NOT NULL,
    "role_id" integer NOT NULL,
    "is_default_role" character varying(255) DEFAULT 'No',
    CONSTRAINT "p_user_role_pkey" PRIMARY KEY ("id")
) WITH (oids = false);

TRUNCATE "p_user_role";
INSERT INTO "p_user_role" ("id", "user_id", "role_id", "is_default_role") VALUES
(2,	1,	1,	'Yes'),
(3,	2,	2,	'Yes'),
(9,	10,	3,	'Yes'),
(13,	9,	3,	'No'),
(14,	9,	4,	'Yes'),
(17,	9,	2,	'No');

DROP TABLE IF EXISTS "pegawai";
DROP SEQUENCE IF EXISTS pegawai_id_seq;
CREATE SEQUENCE pegawai_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 START 5 CACHE 1;

CREATE TABLE "public"."pegawai" (
    "id" integer DEFAULT nextval('pegawai_id_seq') NOT NULL,
    "pegawai_id" integer,
    "nip_nik" character varying(256) NOT NULL,
    "nama" character varying(256) NOT NULL,
    "jenis_kelamin_id" integer NOT NULL,
    "tempat_lahir" character varying(256) NOT NULL,
    "tanggal_lahir" date NOT NULL,
    "mulai_bekerja" date NOT NULL,
    "foto" text,
    "is_aktif" boolean DEFAULT true NOT NULL,
    CONSTRAINT "pegawai_pkey" PRIMARY KEY ("id")
) WITH (oids = false);

TRUNCATE "pegawai";
INSERT INTO "pegawai" ("id", "pegawai_id", "nip_nik", "nama", "jenis_kelamin_id", "tempat_lahir", "tanggal_lahir", "mulai_bekerja", "foto", "is_aktif") VALUES
(5,	4,	'202020',	'Aida',	2,	'Sidoarjo',	'2023-09-13',	'2023-09-13',	'null',	't'),
(4,	NULL,	'101010',	'Arbi W',	1,	'Sidoarjo',	'2023-09-12',	'2023-09-12',	'repo/pegawai/Luffy.jpg',	't');

DROP TABLE IF EXISTS "pegawai_jabatan";
DROP SEQUENCE IF EXISTS pegawai_jabatan_id_seq;
CREATE SEQUENCE pegawai_jabatan_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 START 14 CACHE 1;

CREATE TABLE "public"."pegawai_jabatan" (
    "id" integer DEFAULT nextval('pegawai_jabatan_id_seq') NOT NULL,
    "pegawai_id" integer NOT NULL,
    "jabatan_id" integer NOT NULL,
    CONSTRAINT "pegawai_jabatan_pkey" PRIMARY KEY ("id")
) WITH (oids = false);

CREATE INDEX "pegawai_jabatan_jabatan_id" ON "public"."pegawai_jabatan" USING btree ("jabatan_id");

CREATE INDEX "pegawai_jabatan_pegawai_id" ON "public"."pegawai_jabatan" USING btree ("pegawai_id");

TRUNCATE "pegawai_jabatan";
INSERT INTO "pegawai_jabatan" ("id", "pegawai_id", "jabatan_id") VALUES
(12,	5,	6),
(14,	4,	6),
(11,	4,	5);

ALTER TABLE ONLY "public"."kurikulum" ADD CONSTRAINT "kurikulum_hambatan_id_fkey" FOREIGN KEY (hambatan_id) REFERENCES m_hambatan(id) ON UPDATE CASCADE ON DELETE RESTRICT NOT VALID NOT DEFERRABLE;

ALTER TABLE ONLY "public"."kurikulum_aspek" ADD CONSTRAINT "kurikulum_aspek_kurikulum_id_fkey" FOREIGN KEY (kurikulum_id) REFERENCES kurikulum(id) ON UPDATE CASCADE ON DELETE CASCADE NOT DEFERRABLE;

ALTER TABLE ONLY "public"."kurikulum_indikator" ADD CONSTRAINT "kurikulum_indikator_kurikulum_kegiatan_id_fkey" FOREIGN KEY (kurikulum_kegiatan_id) REFERENCES kurikulum_kegiatan(id) ON UPDATE CASCADE ON DELETE CASCADE NOT DEFERRABLE;

ALTER TABLE ONLY "public"."kurikulum_kegiatan" ADD CONSTRAINT "kurikulum_kegiatan_kurukulum_target_id_fkey" FOREIGN KEY (kurikulum_target_id) REFERENCES kurikulum_target(id) ON UPDATE CASCADE ON DELETE CASCADE NOT DEFERRABLE;

ALTER TABLE ONLY "public"."kurikulum_target" ADD CONSTRAINT "kurikulum_target_kurikulum_aspek_id_fkey" FOREIGN KEY (kurikulum_aspek_id) REFERENCES kurikulum_aspek(id) ON UPDATE CASCADE ON DELETE CASCADE NOT DEFERRABLE;

ALTER TABLE ONLY "public"."m_hambatan" ADD CONSTRAINT "m_hambatan_jenis_hambatan_id_fkey" FOREIGN KEY (jenis_hambatan_id) REFERENCES m_jenis_hambatan(id) ON UPDATE CASCADE ON DELETE RESTRICT NOT VALID NOT DEFERRABLE;

ALTER TABLE ONLY "public"."matriks_perencanaan" ADD CONSTRAINT "matriks_perencanaan_hambatan_id_fkey" FOREIGN KEY (hambatan_id) REFERENCES m_hambatan(id) ON UPDATE CASCADE ON DELETE RESTRICT NOT DEFERRABLE;

ALTER TABLE ONLY "public"."matriks_perencanaan_aspek" ADD CONSTRAINT "matriks_perencanaan_aspek_matriks_perencanaan_id_fkey" FOREIGN KEY (matriks_perencanaan_id) REFERENCES matriks_perencanaan(id) ON UPDATE CASCADE ON DELETE CASCADE NOT DEFERRABLE;

ALTER TABLE ONLY "public"."matriks_perencanaan_item" ADD CONSTRAINT "matriks_perencanaan_item_matriks_perencanaan_aspek_id_fkey" FOREIGN KEY (matriks_perencanaan_aspek_id) REFERENCES matriks_perencanaan_aspek(id) ON UPDATE CASCADE ON DELETE CASCADE NOT DEFERRABLE;
ALTER TABLE ONLY "public"."matriks_perencanaan_item" ADD CONSTRAINT "matriks_perencanaan_item_matriks_perencanaan_item_id_fkey" FOREIGN KEY (matriks_perencanaan_item_id) REFERENCES matriks_perencanaan_item(id) ON UPDATE CASCADE ON DELETE CASCADE NOT DEFERRABLE;

ALTER TABLE ONLY "public"."p_user" ADD CONSTRAINT "p_user_pegawai_id_fkey" FOREIGN KEY (pegawai_id) REFERENCES pegawai(id) ON UPDATE CASCADE ON DELETE CASCADE NOT DEFERRABLE;

ALTER TABLE ONLY "public"."p_user_role" ADD CONSTRAINT "p_user_role_role_id_fkey" FOREIGN KEY (role_id) REFERENCES p_role(id) ON UPDATE CASCADE ON DELETE RESTRICT NOT DEFERRABLE;
ALTER TABLE ONLY "public"."p_user_role" ADD CONSTRAINT "p_user_role_user_id_fkey" FOREIGN KEY (user_id) REFERENCES p_user(id) ON UPDATE CASCADE ON DELETE CASCADE NOT DEFERRABLE;

ALTER TABLE ONLY "public"."pegawai_jabatan" ADD CONSTRAINT "pegawai_jabatan_jabatan_id_fkey" FOREIGN KEY (jabatan_id) REFERENCES m_jabatan(id) ON UPDATE CASCADE ON DELETE RESTRICT NOT VALID NOT DEFERRABLE;
ALTER TABLE ONLY "public"."pegawai_jabatan" ADD CONSTRAINT "pegawai_jabatan_pegawai_id_fkey" FOREIGN KEY (pegawai_id) REFERENCES pegawai(id) ON UPDATE CASCADE ON DELETE CASCADE NOT DEFERRABLE;

-- 2023-09-15 11:29:41.879466+07
