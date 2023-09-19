drop database if exists gestion_parc;
create database if not exists gestion_parc;
use gestion_parc;

create table materiel(
    numero int(65) auto_increment primary key,
    nature varchar(50),
    date_entree  date,
    Date_sortie date,
    Num_config_ancien varchar(50),
    Num_config_nouveau varchar(50),
    INF varchar(50) unique,
    
    Numero_serie varchar(50) unique,
   
    Etat varchar(50),
    Mode_migration varchar(50),
    Date_migration date,
   Cout_materiel varchar(100)
    
   
);

create table corbeille(
    idc int(65) auto_increment primary key,
    Nature varchar(50),
    date_entree  date,
    Date_sortie date,
    Num_config_ancien varchar(50),
    Num_config_nouveau varchar(50),
    INF varchar(50) ,
    
    Numero_serie varchar(50) ,
   
    Etat varchar(50),
    Mode_migration varchar(50),
    Date_migration date,
   Cout_materiel varchar(100)
    
   
);



create table utilisateur(
    idU int(50) auto_increment primary key,             
     Utilisateur_btl varchar(50),
     Nom_utilisateur varchar(50),
     Site varchar(50),
     Nom_direction varchar(50),
    email varchar(55)
);



create table mat_utilisateur(
    idM int(51) auto_increment primary key,
    INF varchar(50),
     Utilisateur_btl varchar(50),
     Nom_direction varchar(50),
     Site varchar(50),
    email varchar(50),
     Date date,
     motif varchar(200)
);


create table user(
    Iduser int(4) auto_increment primary key,
    login varchar(50) ,
    role varchar(51),
    email varchar(51),
     pwd varchar (50),
     etat int(1)
);




	
	
INSERT INTO utilisateur(Utilisateur_btl,Nom_utilisateur,Site,Nom_direction,email) VALUES 
    ('NGH282','bina','bassa','CI','admin@gmail.com'),
    ('TZT989','concil','bassa','DRH','user1@gmail.com'),
    ('ALO922','Microsoft','bassa','CI','user2@gmail.com');	

INSERT INTO materiel(nature,date_entree,Date_sortie,Num_config_ancien,Num_config_nouveau,INF,Numero_serie,Etat,Mode_migration,Date_migration,Cout_materiel) VALUES
    ('Laptop','2018-02-21','2025-02-21','BCMDLC1','BCMDLC3','INF2018-001','10:65:30:11:EE:E2','Migre','Cle usb','2021-04-24','150000f'),
	 ('Desxtop','2019-06-15','2026-02-21','BCMDLC8','BCMDLC6','INF2019-523','00:4E:01:9B:29:C7','Migre','SCCM','2021-06-15', '140000f'),
	 ('Desxtop','2014-10-30','2026-02-21','BCMDLC2','BCMDLC12','INF2016-011','10:65:30:11:EE:S3','Migre','Cle usb','2021-07-18', '120000f');

INSERT INTO corbeille(nature,date_entree,Date_sortie,Num_config_ancien,Num_config_nouveau,INF,Numero_serie,Etat,Mode_migration,Date_migration,Cout_materiel) VALUES
    ('Laptop','2018-02-21','2021-02-21','BCMDLC1','BCMDLC3','INF2018-001','10:65:30:11:EE:E2','Migre','Cle usb','2021-04-24','350000f'),
    ('souris','2019-02-21','2022-02-21','BCMDLC1','BCMDLC3','INF2019-003','10:65:30:11:EE:E2','non','non','non','5000f');

   INSERT INTO user(login,role,email,pwd,etat) VALUES 
   ('isclif','Admin','leoben@gmail.com',md5('123'),'1'),
   ('bina','user','Bina@gmail.com',md5('1345'),'0') ;
  


select * from materiel;
select * from utilisateur;
select * from corbeille;
select * from user;
select * from mat_utilisateur;








CREATION DU TRIGGER
begin
INSERT INTO `corbeille`( `nature`, `date_entree`, `Date_sortie`, `Num_config_ancien`, `Num_config_nouveau`, `INF`, `Numero_serie`, `Mode_migration`, `Date_migration`, `Cout_materiel`)
VALUES(OLD.nature,OLD.date_entree,OLD.Date_sortie,OLD.Num_config_ancien,
OLD.Num_config_nouveau,OLD.INF,OLD.Numero_serie,OLD.Mode_migration,OLD.Date_migration,
OLD.Cout_materiel);
end


