/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     5/14/2019 3:22:42 PM                         */
/*==============================================================*/


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

drop table if exists DAK;

drop table if exists DATASPA;

drop table if exists DED;

drop table if exists DEDLOKASI;

drop table if exists DETAIL_PEMELIHARAAN;

drop table if exists JENIS_PEGAWAI;

drop table if exists KIBA;

drop table if exists KIBD;

drop table if exists KIBF;

drop table if exists LOKASI;

drop table if exists PEGAWAI;

drop table if exists PEMELIHARAAN;

/*==============================================================*/
/* Table: ASET                                                  */
/*==============================================================*/
create table ASET
(
   ID_ASET              char(10) not null  comment '',
   NAMA_ASET            varchar(25)  comment '',
   primary key (ID_ASET)
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
   USULAN_TAMBAHAN_SUMBER_DANA float  comment '',
   primary key (ID_DAK)
);

/*==============================================================*/
/* Table: DATASPA                                               */
/*==============================================================*/
create table DATASPA
(
   ID_DATASPA           char(10) not null  comment '',
   NAMA_DATASPA         varchar(50)  comment '',
   LINK_GIS             text  comment '',
   primary key (ID_DATASPA)
);

/*==============================================================*/
/* Table: DED                                                   */
/*==============================================================*/
create table DED
(
   ID_DED               char(10) not null  comment '',
   PATH_FILE            text  comment '',
   primary key (ID_DED)
);

/*==============================================================*/
/* Table: DEDLOKASI                                             */
/*==============================================================*/
create table DEDLOKASI
(
   ID_LOKASI            char(10) not null  comment '',
   ID_DED               char(10) not null  comment '',
   primary key (ID_LOKASI, ID_DED)
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
   VOLUME               float  comment '',
   primary key (ID_DETAIL_PEMELIHARAAN)
);

/*==============================================================*/
/* Table: JENIS_PEGAWAI                                         */
/*==============================================================*/
create table JENIS_PEGAWAI
(
   ID_JENIS             char(10) not null  comment '',
   NAMA_JENIS           varchar(25)  comment '',
   primary key (ID_JENIS)
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
   primary key (ID_KIBA)
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
   primary key (ID_KIBD)
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
   primary key (ID_KIBF)
);

/*==============================================================*/
/* Table: LOKASI                                                */
/*==============================================================*/
create table LOKASI
(
   ID_LOKASI            char(10) not null  comment '',
   NAMA_LOKASI          varchar(25)  comment '',
   primary key (ID_LOKASI)
);

/*==============================================================*/
/* Table: PEGAWAI                                               */
/*==============================================================*/
create table PEGAWAI
(
   NOMOR_INDUK_PEGAWAI  char(10) not null  comment '',
   ID_JENIS             char(10) not null  comment '',
   NAMA_PEGAWAI         char(12)  comment '',
   PASSWORD             varchar(25)  comment '',
   primary key (NOMOR_INDUK_PEGAWAI)
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
   TANGGAL_AKHIR        date  comment '',
   primary key (ID_PEMELIHARAAN)
);

alter table DAK add constraint FK_DAK_LOKASIDAK_LOKASI foreign key (ID_LOKASI)
      references LOKASI (ID_LOKASI) on delete restrict on update restrict;

alter table DEDLOKASI add constraint FK_DEDLOKAS_DEDLOKASI_LOKASI foreign key (ID_LOKASI)
      references LOKASI (ID_LOKASI) on delete restrict on update restrict;

alter table DEDLOKASI add constraint FK_DEDLOKAS_DEDLOKASI_DED foreign key (ID_DED)
      references DED (ID_DED) on delete restrict on update restrict;

alter table DETAIL_PEMELIHARAAN add constraint FK_DETAIL_P_PEMELIHAR_PEMELIHA foreign key (ID_PEMELIHARAAN)
      references PEMELIHARAAN (ID_PEMELIHARAAN) on delete restrict on update restrict;

alter table KIBA add constraint FK_KIBA_LOKASIKIB_LOKASI foreign key (ID_LOKASI)
      references LOKASI (ID_LOKASI) on delete restrict on update restrict;

alter table KIBA add constraint FK_KIBA_SPATIALKI_DATASPA foreign key (ID_DATASPA)
      references DATASPA (ID_DATASPA) on delete restrict on update restrict;

alter table KIBD add constraint FK_KIBD_ASETKIBD_ASET foreign key (ID_ASET)
      references ASET (ID_ASET) on delete restrict on update restrict;

alter table KIBD add constraint FK_KIBD_LOKASIKIB_LOKASI foreign key (ID_LOKASI)
      references LOKASI (ID_LOKASI) on delete restrict on update restrict;

alter table KIBD add constraint FK_KIBD_SPATIALKI_DATASPA foreign key (ID_DATASPA)
      references DATASPA (ID_DATASPA) on delete restrict on update restrict;

alter table KIBF add constraint FK_KIBF_ASETKIBF_ASET foreign key (ID_ASET)
      references ASET (ID_ASET) on delete restrict on update restrict;

alter table KIBF add constraint FK_KIBF_LOKASIKIB_LOKASI foreign key (ID_LOKASI)
      references LOKASI (ID_LOKASI) on delete restrict on update restrict;

alter table KIBF add constraint FK_KIBF_SPATIALKI_DATASPA foreign key (ID_DATASPA)
      references DATASPA (ID_DATASPA) on delete restrict on update restrict;

alter table PEGAWAI add constraint FK_PEGAWAI_JENISPEGA_JENIS_PE foreign key (ID_JENIS)
      references JENIS_PEGAWAI (ID_JENIS) on delete restrict on update restrict;

alter table PEMELIHARAAN add constraint FK_PEMELIHA_RELATIONS_DAK foreign key (ID_DAK)
      references DAK (ID_DAK) on delete restrict on update restrict;

