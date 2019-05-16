/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     5/16/2019 6:58:52 AM                         */
/*==============================================================*/

/*
alter table DAK 
   drop foreign key FK_DAK_LOKASIDAK_LOKASI;

alter table DEDLOKASI 
   drop foreign key FK_DEDLOKAS_DEDLOKASI_LOKASI;

alter table DEDLOKASI 
   drop foreign key FK_DEDLOKAS_DEDLOKASI_DED;

alter table DETAIL_PEMELIHARAAN 
   drop foreign key FK_DETAIL_P_PEMELIHAR_PEMELIHA;

alter table KIBA 
   drop foreign key FK_KIBA_LOKASIKIB_LOKASI;

alter table KIBA 
   drop foreign key FK_KIBA_SPATIALKI_DATASPA;

alter table KIBD 
   drop foreign key FK_KIBD_ASETKIBD_ASET;

alter table KIBD 
   drop foreign key FK_KIBD_LOKASIKIB_LOKASI;

alter table KIBD 
   drop foreign key FK_KIBD_SPATIALKI_DATASPA;

alter table KIBF 
   drop foreign key FK_KIBF_ASETKIBF_ASET;

alter table KIBF 
   drop foreign key FK_KIBF_LOKASIKIB_LOKASI;

alter table KIBF 
   drop foreign key FK_KIBF_SPATIALKI_DATASPA;

alter table PEGAWAI 
   drop foreign key FK_PEGAWAI_JENISPEGA_JENIS_PE;

alter table PEMELIHARAAN 
   drop foreign key FK_PEMELIHA_RELATIONS_DAK;

drop table if exists ASET;


alter table DAK 
   drop foreign key FK_DAK_LOKASIDAK_LOKASI;

drop table if exists DAK;

drop table if exists DATASPA;

drop table if exists DED;


alter table DEDLOKASI 
   drop foreign key FK_DEDLOKAS_DEDLOKASI_LOKASI;

alter table DEDLOKASI 
   drop foreign key FK_DEDLOKAS_DEDLOKASI_DED;

drop table if exists DEDLOKASI;


alter table DETAIL_PEMELIHARAAN 
   drop foreign key FK_DETAIL_P_PEMELIHAR_PEMELIHA;

drop table if exists DETAIL_PEMELIHARAAN;

drop table if exists JENIS_PEGAWAI;


alter table KIBA 
   drop foreign key FK_KIBA_LOKASIKIB_LOKASI;

alter table KIBA 
   drop foreign key FK_KIBA_SPATIALKI_DATASPA;

drop table if exists KIBA;


alter table KIBD 
   drop foreign key FK_KIBD_LOKASIKIB_LOKASI;

alter table KIBD 
   drop foreign key FK_KIBD_ASETKIBD_ASET;

alter table KIBD 
   drop foreign key FK_KIBD_SPATIALKI_DATASPA;

drop table if exists KIBD;


alter table KIBF 
   drop foreign key FK_KIBF_LOKASIKIB_LOKASI;

alter table KIBF 
   drop foreign key FK_KIBF_ASETKIBF_ASET;

alter table KIBF 
   drop foreign key FK_KIBF_SPATIALKI_DATASPA;

drop table if exists KIBF;

drop table if exists LOKASI;


alter table PEGAWAI 
   drop foreign key FK_PEGAWAI_JENISPEGA_JENIS_PE;

drop table if exists PEGAWAI;


alter table PEMELIHARAAN 
   drop foreign key FK_PEMELIHA_RELATIONS_DAK;

drop table if exists PEMELIHARAAN;
*/
/*==============================================================*/
/* Table: ASET                                                  */
/*==============================================================*/
create table ASET
(
   ID_ASET              char(10) not null  comment '',
   NAMA_ASET            varchar(25)  comment ''
);

/*==============================================================*/
/* Table: DAK                                                   */
/*==============================================================*/
create table DAK
(
   ID_DAK               char(10) not null  comment '',
   ID_LOKASI            char(10)  comment '',
   LUAS                 int  comment '',
   PANJANG              float  comment '',
   LEBAR                float  comment '',
   PANJANG_BAIK_M       float  comment '',
   PANJANG_BAIK_PERS    float  comment '',
   PANJANG_SEDANG_M     float  comment '',
   PANJANG_SEDANG_PERS  float  comment '',
   PANJANG_RUSAKRINGAN_M float  comment '',
   PANJANG_RUSAKRINGAN_PERS float  comment '',
   PANJANG_RUSAKBERAT_M float  comment '',
   PANJANG_RUSAKBERAT_PERS float  comment '',
   RENCANA_PENANGANAN   varchar(50)  comment '',
   KEBUTUHAN_ANGGARAN   float(8,2)  comment '',
   KEMAMPUAN_RUPIAH     float  comment '',
   KEMAMPUAN_M          float  comment '',
   USULAN_TAMBAHAN_RUPIAH float  comment '',
   USULAN_TAMBAHAN_M    float  comment '',
   USULAN_TAMBAHAN_SUMBER_DANA float  comment ''
);

/*==============================================================*/
/* Table: DATASPA                                               */
/*==============================================================*/
create table DATASPA
(
   ID_DATASPA           char(10) not null  comment '',
   NAMA_DATASPA         varchar(50)  comment '',
   LINK_GIS             text  comment ''
);

/*==============================================================*/
/* Table: DED                                                   */
/*==============================================================*/
create table DED
(
   ID_DED               char(10) not null  comment '',
   PATH_FILE            text  comment ''
);

/*==============================================================*/
/* Table: DEDLOKASI                                             */
/*==============================================================*/
create table DEDLOKASI
(
   ID_LOKASI            char(10) not null  comment '',
   ID_DED               char(10) not null  comment ''
);

/*==============================================================*/
/* Table: DETAIL_PEMELIHARAAN                                   */
/*==============================================================*/
create table DETAIL_PEMELIHARAAN
(
   ID_DETAIL_PEMELIHARAAN char(10) not null  comment '',
   ID_PEMELIHARAAN      char(10) not null  comment '',
   JENIS_PEMELIHARAAN   varchar(30)  comment '',
   BIAYA                float(8,2)  comment '',
   VOLUME               float  comment ''
);

/*==============================================================*/
/* Table: JENIS_PEGAWAI                                         */
/*==============================================================*/
create table JENIS_PEGAWAI
(
   ID_JENIS             char(10) not null  comment '',
   NAMA_JENIS           varchar(25)  comment ''
);

/*==============================================================*/
/* Table: KIBA                                                  */
/*==============================================================*/
create table KIBA
(
   ID_KIBA              char(10) not null  comment '',
   ID_LOKASI            char(10) not null  comment '',
   ID_DATASPA           char(10) not null  comment '',
   NOMOR_KODE_BARANG    char(15)  comment '',
   NOMOR_REGISTER       int  comment '',
   LUAS                 int  comment '',
   TAHUN_PENGADAAN      date  comment '',
   HAK                  varchar(20)  comment '',
   TANGGAL_SERTIFIKAT   date  comment '',
   NOMOR_SERTIFIKAT     varchar(25)  comment '',
   PENGGUNAAN           varchar(30)  comment '',
   HARGA                int  comment '',
   NAMA_BARANG          varchar(1024)  comment '',
   KETERANGAN           text  comment '',
   ASAL_USUL            varchar(30)  comment '',
   FOTO                 varchar(100)  comment '',
   FILE                 varchar(100)  comment ''
);

/*==============================================================*/
/* Table: KIBD                                                  */
/*==============================================================*/
create table KIBD
(
   ID_KIBD              char(10) not null  comment '',
   ID_LOKASI            char(10) not null  comment '',
   ID_DATASPA           char(10) not null  comment '',
   ID_ASET              char(10) not null  comment '',
   JENIS                varchar(25)  comment '',
   NAMA_BARANG          varchar(1024)  comment '',
   NOMOR_KODE_BARANG    char(15)  comment '',
   NOMOR_REGISTER       int  comment '',
   KONSTRUKSI           varchar(30)  comment '',
   PANJANG              float  comment '',
   LEBAR                float  comment '',
   LUAS                 int  comment '',
   TANGGAL_DOKUMEN      date  comment '',
   NOMOR_DOKUMEN        varchar(25)  comment '',
   STATUS_TANAH         varchar(15)  comment '',
   NOMOR_KODE           varchar(15)  comment '',
   ASAL_USUL            varchar(30)  comment '',
   HARGA                int  comment '',
   KONDISI              varchar(5)  comment '',
   KETERANGAN           text  comment '',
   FOTO                 varchar(100)  comment '',
   FILE                 varchar(100)  comment ''
);

/*==============================================================*/
/* Table: KIBF                                                  */
/*==============================================================*/
create table KIBF
(
   ID_KIBF              char(10) not null  comment '',
   ID_DATASPA           char(10) not null  comment '',
   ID_LOKASI            char(10) not null  comment '',
   ID_ASET              char(10) not null  comment '',
   BANGUNAN             varchar(15)  comment '',
   BERTINGKAT           varchar(15)  comment '',
   BETON                varchar(15)  comment '',
   PANJANG              float  comment '',
   TANGGAL_DOKUMEN      date  comment '',
   NOMOR_DOKUMEN        varchar(25)  comment '',
   TANGGAL_MULAI        date  comment '',
   STATUS_TANAH         varchar(15)  comment '',
   NOMO_KODE_TANAH      varchar(25)  comment '',
   NILAI_KONTRAK        int  comment '',
   NAMA_BARANG          varchar(1024)  comment '',
   KETERANGAN           text  comment '',
   ASAL_USUL            varchar(30)  comment '',
   FOTO                 varchar(100)  comment '',
   FILE                 varchar(100)  comment ''
);

/*==============================================================*/
/* Table: LOKASI                                                */
/*==============================================================*/
create table LOKASI
(
   ID_LOKASI            char(10) not null  comment '',
   NAMA_LOKASI          varchar(25)  comment ''
);

/*==============================================================*/
/* Table: PEGAWAI                                               */
/*==============================================================*/
create table PEGAWAI
(
   NOMOR_INDUK_PEGAWAI  char(10) not null  comment '',
   ID_JENIS             char(10) not null  comment '',
   NAMA_PEGAWAI         char(12)  comment '',
   PASSWORD             varchar(25)  comment ''
);

/*==============================================================*/
/* Table: PEMELIHARAAN                                          */
/*==============================================================*/
create table PEMELIHARAAN
(
   ID_PEMELIHARAAN      char(10) not null  comment '',
   ID_DAK               char(10)  comment '',
   TOTAL_BIAYA          float(8,2)  comment '',
   TANGGAL_MULAI        date  comment '',
   TANGGAL_AKHIR        date  comment ''
);

