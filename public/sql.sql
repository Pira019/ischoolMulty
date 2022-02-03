
insert into annee(annee_scolaire, remarques, nbr_management, nbr_informatique, prct_absenteism, nbr_laureats_management, nbr_laureat_informatique) values ('2021/2022', 'Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus.

Phasellus in felis. Donec semper sapien a libero. Nam dui.', 14, 24, 65, 95, 31);
insert into annee(annee_scolaire, remarques, nbr_management, nbr_informatique, prct_absenteism, nbr_laureats_management, nbr_laureat_informatique) values ('2020/2021', 'Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris.', 32, 90, 39, 91, 39);


/*classe*/

insert into classe (code_classe, nom_classe, salle_principale, code_Filiere, niveauClasse, MasseHoraireAnnuelle) values ('68712-042', 'Faustine Holligan', 1, 'MU', 1, 78);
insert into classe (code_classe, nom_classe, salle_principale, code_Filiere, niveauClasse, MasseHoraireAnnuelle) values ('64893-801', 'Ivy Dudding', 2, 'CO', 2, 76);
insert into classe (code_classe, nom_classe, salle_principale, code_Filiere, niveauClasse, MasseHoraireAnnuelle) values ('11086-037', 'Janeva Detoc', 3, 'RU', 3, 93);
insert into classe (code_classe, nom_classe, salle_principale, code_Filiere, niveauClasse, MasseHoraireAnnuelle) values ('49288-0147', 'Orella Beetles', 4, 'US', 4, 2);
insert into classe (code_classe, nom_classe, salle_principale, code_Filiere, niveauClasse, MasseHoraireAnnuelle) values ('49288-0682', 'Erin McGoon', 5, 'BJ', 5, 26);


insert into class_mod_prof (codeclasse, codeModule, codeProfesseur, codeFiliere, dureeHeures, semestre, anneeScolaire, nbControles) values ('68712-042', 1, 1, 'TD', 1, 1, '2020/2021', 2);
insert into class_mod_prof (codeclasse, codeModule, codeProfesseur, codeFiliere, dureeHeures, semestre, anneeScolaire, nbControles) values ('64893-801', 2, 2, 'CN', 2, 2, '2020/2021', 2);
insert into class_mod_prof (codeclasse, codeModule, codeProfesseur, codeFiliere, dureeHeures, semestre, anneeScolaire, nbControles) values ('49288-0147', 3, 3, 'FR', 1, 1, '2021/2022', 2);



insert into filiere (code_filiere, Nom_filiere, nbAnneeFormation) values ('MU', 'Ituran Location and Control Ltd.', 3);
insert into filiere (code_filiere, Nom_filiere, nbAnneeFormation) values ('CO', 'Bank of Nova Scotia (The)',  4);
insert into filiere (code_filiere, Nom_filiere, nbAnneeFormation) values ('US', 'Quest Resource Holding Corporation.',  5);
insert into filiere (code_filiere, Nom_filiere, nbAnneeFormation) values ('RU', 'Bridgeline Digital, Inc.',  5);
insert into filiere (code_filiere, Nom_filiere, nbAnneeFormation) values ('BJ', 'DineEquity, Inc',  4);


 /*etudiants*/

insert into etudiants (Nom_etudiant, prenom_etudiant, Nom_pere, Nom_mere, Nationalité , Telephone_personnel, classe_actuelle, actif, annee_encours) values ('Done', 'Godfree', 'Godfree Done', 'Godfree Done', 'Denmark', '+45 (315) 103-1664', 1, true, '2021/2022');
insert into etudiants (Nom_etudiant, prenom_etudiant, Nom_pere, Nom_mere, Nationalité, Telephone_personnel, classe_actuelle, actif, annee_encours) values ('Mayling', 'Taylor', 'Taylor Mayling', 'Taylor Mayling', 'Malaysia', '+60 (639) 618-0554', 2, true, true);
insert into etudiants (Nom_etudiant, prenom_etudiant, Nom_pere, Nom_mere, Nationalité,  Telephone_personnel, classe_actuelle, actif, annee_encours) values ('Capoun', 'Tatiania', 'Tatiania Capoun', 'Tatiania Capoun', 'Poland',  '+48 (343) 956-4128', 3, false, '2020/2021');
insert into etudiants (Nom_etudiant, prenom_etudiant, Nom_pere, Nom_mere, Nationalité, Telephone_personnel, classe_actuelle, actif, annee_encours) values ('Benzies', 'Lynn', 'Lynn Benzies', 'Lynn Benzies', 'Albania',  '+355 (618) 165-8797', 4, false, '2021/2022');
insert into etudiants (Nom_etudiant, prenom_etudiant, Nom_pere, Nom_mere, Nationalité,  Telephone_personnel, classe_actuelle, actif, annee_encours) values ('Rising', 'Arne', 'Arne Rising', 'Arne Rising', 'Indonesia', '+62 (133) 840-4925', 5, true, '2021/2022');
insert into etudiants (Nom_etudiant, prenom_etudiant, Nom_pere, Nom_mere, Nationalité,  Telephone_personnel, classe_actuelle, actif, annee_encours) values ('Fritschel', 'Berkly', 'Berkly Fritschel', 'Berkly Fritschel','27/07/1998', '+1 (552) 271-9476', 6, false, '2021/2022');
insert into etudiants (Nom_etudiant, prenom_etudiant, Nom_pere, Nom_mere, Nationalité, Telephone_personnel, classe_actuelle, actif, annee_encours) values ('Lumm', 'Salomi', 'Salomi Lumm', 'Salomi Lumm', 'Indonesia',  '+62 (692) 894-7694', 7, false, '2020/2021');
insert into etudiants (Nom_etudiant, prenom_etudiant, Nom_pere, Nom_mere, Nationalité, Telephone_personnel, classe_actuelle, actif, annee_encours) values ('Baildon', 'Malanie', 'Malanie Baildon', 'Malanie Baildon', 'China', '+86 (381) 661-2974', 8, false, '2020/2021');
insert into etudiants (Nom_etudiant, prenom_etudiant, Nom_pere, Nom_mere, Nationalité, Telephone_personnel, classe_actuelle, actif, annee_encours) values ('Gloy', 'Lettie', 'Lettie Gloy', 'Lettie Gloy', 'China', '+86 (271) 618-4872', 9, true, '2021/2022');
insert into etudiants (Nom_etudiant, prenom_etudiant, Nom_pere, Nom_mere, Nationalité , Telephone_personnel, classe_actuelle, actif, annee_encours) values ('Antosik', 'Morgan', 'Morgan Antosik', 'Morgan Antosik', 'Indonesia', '+62 (441) 665-0553', 10, false, '2021/2022');
insert into etudiants (Nom_etudiant, prenom_etudiant, Nom_pere, Nom_mere, Nationalité , Telephone_personnel, classe_actuelle, actif, annee_encours) values ('Gentery', 'Filberto', 'Filberto Gentery', 'Filberto Gentery', 'China', '+86 (315) 924-8464', 11, true, '2020/2021');
insert into etudiants (Nom_etudiant, prenom_etudiant, Nom_pere, Nom_mere, Nationalité , Telephone_personnel, classe_actuelle, actif, annee_encours) values ('Desseine', 'Joe', 'Joe Desseine', 'Joe Desseine', 'Russia', '+7 (444) 142-9767', 12, true, true);
insert into etudiants (Nom_etudiant, prenom_etudiant, Nom_pere, Nom_mere, Nationalité , Telephone_personnel, classe_actuelle, actif, annee_encours) values ('Risebrow', 'Maddalena', 'Maddalena Risebrow', 'Maddalena Risebrow', 'China', '+86 (892) 835-6991', 13, false, true);
insert into etudiants (Nom_etudiant, prenom_etudiant, Nom_pere, Nom_mere, Nationalité , Telephone_personnel, classe_actuelle, actif, annee_encours) values ('Breens', 'Garner', 'Garner Breens', 'Garner Breens', 'Bahamas', '+1 (517) 747-6803', 14, true, '2021/2022');
insert into etudiants (Nom_etudiant, prenom_etudiant, Nom_pere, Nom_mere, Nationalité , Telephone_personnel, classe_actuelle, actif, annee_encours) values ('Krahl', 'Hedy', 'Hedy Krahl', 'Hedy Krahl', 'Bangladesh', '+880 (442) 278-7268', 15, false, '2021/2022');
insert into etudiants (Nom_etudiant, prenom_etudiant, Nom_pere, Nom_mere, Nationalité , Telephone_personnel, classe_actuelle, actif, annee_encours) values ('Leyborne', 'Keith', 'Keith Leyborne', 'Keith Leyborne', 'China', '+86 (686) 640-7372', 16, false, '2021/2022');
insert into etudiants (Nom_etudiant, prenom_etudiant, Nom_pere, Nom_mere, Nationalité , Telephone_personnel, classe_actuelle, actif, annee_encours) values ('Pallatina', 'Shandy', 'Shandy Pallatina', 'Shandy Pallatina', 'Armenia', '+374 (586) 616-3037', 17, true, '2020/2021');
insert into etudiants (Nom_etudiant, prenom_etudiant, Nom_pere, Nom_mere, Nationalité , Telephone_personnel, classe_actuelle, actif, annee_encours) values ('Edmed', 'Marcelo', 'Marcelo Edmed', 'Marcelo Edmed', 'Peru', '+51 (570) 953-5800', 18, true, '2021/2022');
insert into etudiants (Nom_etudiant, prenom_etudiant, Nom_pere, Nom_mere, Nationalité , Telephone_personnel, classe_actuelle, actif, annee_encours) values ('Shuttell', 'Rickard', 'Rickard Shuttell', 'Rickard Shuttell', 'Poland', '+48 (295) 908-2456', 19, false, '2020/2021');
insert into etudiants (Nom_etudiant, prenom_etudiant, Nom_pere, Nom_mere, Nationalité , Telephone_personnel, classe_actuelle, actif, annee_encours) values ('Deehan', 'Gayla', 'Gayla Deehan', 'Gayla Deehan', 'Sweden', '+46 (365) 593-3144', 20, false, '2021/2022');
insert into etudiants (Nom_etudiant, prenom_etudiant, Nom_pere, Nom_mere, Nationalité , Telephone_personnel, classe_actuelle, actif, annee_encours) values ('Gowans', 'Karena', 'Karena Gowans', 'Karena Gowans', 'Tanzania', '+255 (241) 244-7006', 21, false, '2021/2022');
insert into etudiants (Nom_etudiant, prenom_etudiant, Nom_pere, Nom_mere, Nationalité, Telephone_personnel, classe_actuelle, actif, annee_encours) values ('Barkes', 'Asia', 'Asia Barkes', 'Asia Barkes', 'Philippines', '+63 (707) 209-9390', 22, false, '2020/2021');
insert into etudiants (Nom_etudiant, prenom_etudiant, Nom_pere, Nom_mere, Nationalité , Telephone_personnel, classe_actuelle, actif, annee_encours) values ('Dagnan', 'Sosanna', 'Sosanna Dagnan', 'Sosanna Dagnan', 'Philippines', '+63 (316) 363-1193', 23, true, '2021/2022');
insert into etudiants (Nom_etudiant, prenom_etudiant, Nom_pere, Nom_mere, Nationalité , Telephone_personnel, classe_actuelle, actif, annee_encours) values ('Guswell', 'Leandra', 'Leandra Guswell', 'Leandra Guswell', 'Canada', '+1 (333) 760-3330', 24, false, '2020/2021');
insert into etudiants (Nom_etudiant, prenom_etudiant, Nom_pere, Nom_mere, Nationalité , Telephone_personnel, classe_actuelle, actif, annee_encours) values ('Peret', 'Conny', 'Conny Peret', 'Conny Peret', 'Cameroon','+237 (681) 887-4409', 25, false, '2021/2022');
insert into etudiants (Nom_etudiant, prenom_etudiant, Nom_pere, Nom_mere, Nationalité , Telephone_personnel, classe_actuelle, actif, annee_encours) values ('Marrill', 'Corbet', 'Corbet Marrill', 'Corbet Marrill', 'Indonesia', '+62 (121) 349-7228', 26, false, '2020/2021');
insert into etudiants (Nom_etudiant, prenom_etudiant, Nom_pere, Nom_mere, Nationalité , Telephone_personnel, classe_actuelle, actif, annee_encours) values ('Dovermann', 'Maddi', 'Maddi Dovermann', 'Maddi Dovermann', 'Indonesia', '+62 (501) 821-8292', 27, true, true);
insert into etudiants (Nom_etudiant, prenom_etudiant, Nom_pere, Nom_mere, Nationalité , Telephone_personnel, classe_actuelle, actif, annee_encours) values ('Sergison', 'Wendye', 'Wendye Sergison', 'Wendye Sergison', 'Sweden', '+46 (331) 796-9437', 28, true, '2020/2021');
insert into etudiants (Nom_etudiant, prenom_etudiant, Nom_pere, Nom_mere, Nationalité , Telephone_personnel, classe_actuelle, actif, annee_encours) values ('Stilling', 'Rockie', 'Rockie Stilling', 'Rockie Stilling', 'Chad', '+235 (852) 795-3320', 29, false, '2020/2021');
insert into etudiants (Nom_etudiant, prenom_etudiant, Nom_pere, Nom_mere, Nationalité , Telephone_personnel, classe_actuelle, actif, annee_encours) values ('Kettlesting', 'Sioux', 'Sioux Kettlesting', 'Sioux Kettlesting', 'Cape Verde',  '+238 (979) 686-4271', 30, false, '2020/2021');
insert into etudiants (Nom_etudiant, prenom_etudiant, Nom_pere, Nom_mere, Nationalité , Telephone_personnel, classe_actuelle, actif, annee_encours) values ('Rispin', 'Sarita', 'Sarita Rispin', 'Sarita Rispin', 'China', '+86 (941) 175-7677', 31, true, '2021/2022');
insert into etudiants (Nom_etudiant, prenom_etudiant, Nom_pere, Nom_mere, Nationalité , Telephone_personnel, classe_actuelle, actif, annee_encours) values ('Rodman', 'Janeva', 'Janeva Rodman', 'Janeva Rodman', 'Brazil','+55 (710) 766-2661', 32, false, '2021/2022');
insert into etudiants (Nom_etudiant, prenom_etudiant, Nom_pere, Nom_mere, Nationalité , Telephone_personnel, classe_actuelle, actif, annee_encours) values ('Dameisele', 'Rainer', 'Rainer Dameisele', 'Rainer Dameisele', 'Brazil', '+55 (302) 376-0063', 33, false, true);
insert into etudiants (Nom_etudiant, prenom_etudiant, Nom_pere, Nom_mere, Nationalité , Telephone_personnel, classe_actuelle, actif, annee_encours) values ('Genthner', 'Luisa', 'Luisa Genthner', 'Luisa Genthner', 'Malaysia', '+60 (251) 213-3629', 34, false, '2021/2022');
insert into etudiants (Nom_etudiant, prenom_etudiant, Nom_pere, Nom_mere, Nationalité , Telephone_personnel, classe_actuelle, actif, annee_encours) values ('Gothliff', 'Larina', 'Larina Gothliff', 'Larina Gothliff', 'Portugal',  '+351 (554) 700-3086', 35, true, '2021/2022');
insert into etudiants (Nom_etudiant, prenom_etudiant, Nom_pere, Nom_mere, Nationalité , Telephone_personnel, classe_actuelle, actif, annee_encours) values ('Pilgrim', 'Neile', 'Neile Pilgrim', 'Neile Pilgrim', 'Indonesia', '+62 (193) 971-0231', 36, true, '2021/2022');
insert into etudiants (Nom_etudiant, prenom_etudiant, Nom_pere, Nom_mere, Nationalité , Telephone_personnel, classe_actuelle, actif, annee_encours) values ('Gaskins', 'Aurora', 'Aurora Gaskins', 'Aurora Gaskins', 'Cuba', '+53 (434) 991-1031', 37, false, '2020/2021');
insert into etudiants (Nom_etudiant, prenom_etudiant, Nom_pere, Nom_mere, Nationalité , Telephone_personnel, classe_actuelle, actif, annee_encours) values ('Mechic', 'Bel', 'Bel Mechic', 'Bel Mechic', 'Saudi Arabia', '+966 (690) 502-5723', 38, true, '2021/2022');
insert into etudiants (Nom_etudiant, prenom_etudiant, Nom_pere, Nom_mere, Nationalité , Telephone_personnel, classe_actuelle, actif, annee_encours) values ('Mouse', 'Gertrud', 'Gertrud Mouse', 'Gertrud Mouse', 'Ethiopia', '+251 (383) 856-1397', 39, false, '2020/2021');
insert into etudiants (Nom_etudiant, prenom_etudiant, Nom_pere, Nom_mere, Nationalité , Telephone_personnel, classe_actuelle, actif, annee_encours) values ('Myford', 'Sunny', 'Sunny Myford', 'Sunny Myford', 'Laos', '+856 (840) 601-1246', 40, true, '2021/2022');
insert into etudiants (Nom_etudiant, prenom_etudiant, Nom_pere, Nom_mere, Nationalité , Telephone_personnel, classe_actuelle, actif, annee_encours) values ('Bunston', 'Abbie', 'Abbie Bunston', 'Abbie Bunston', 'Ivory Coast', '+225 (586) 363-9016', 41, false, '2021/2022');
insert into etudiants (Nom_etudiant, prenom_etudiant, Nom_pere, Nom_mere, Nationalité , Telephone_personnel, classe_actuelle, actif, annee_encours) values ('Redhead', 'Dode', 'Dode Redhead', 'Dode Redhead', 'Indonesia',  '+62 (709) 652-7130', 42, true, '2020/2021');
insert into etudiants (Nom_etudiant, prenom_etudiant, Nom_pere, Nom_mere, Nationalité , Telephone_personnel, classe_actuelle, actif, annee_encours) values ('Stockow', 'Misty', 'Misty Stockow', 'Misty Stockow', 'Latvia',  '+371 (635) 594-8006', 43, false, '2021/2022');
insert into etudiants (Nom_etudiant, prenom_etudiant, Nom_pere, Nom_mere, Nationalité , Telephone_personnel, classe_actuelle, actif, annee_encours) values ('Erik', 'Ritchie', 'Ritchie Erik', 'Ritchie Erik', 'Japan', '+81 (712) 845-1554', 44, true, '2021/2022');
insert into etudiants (Nom_etudiant, prenom_etudiant, Nom_pere, Nom_mere, Nationalité , Telephone_personnel, classe_actuelle, actif, annee_encours) values ('Heigl', 'Audy', 'Audy Heigl', 'Audy Heigl', 'Bangladesh', '+880 (216) 562-0797', 45, true, '2021/2022');
insert into etudiants (Nom_etudiant, prenom_etudiant, Nom_pere, Nom_mere, Nationalité , Telephone_personnel, classe_actuelle, actif, annee_encours) values ('Kelly', 'Lissa', 'Lissa Kelly', 'Lissa Kelly', 'Portugal',  '+351 (431) 621-4264', 46, false, '2021/2022');
insert into etudiants (Nom_etudiant, prenom_etudiant, Nom_pere, Nom_mere, Nationalité , Telephone_personnel, classe_actuelle, actif, annee_encours) values ('Alanbrooke', 'Flynn', 'Flynn Alanbrooke', 'Flynn Alanbrooke', 'Philippines',  '+63 (721) 385-2580', 47, true, '2020/2021');
insert into etudiants (Nom_etudiant, prenom_etudiant, Nom_pere, Nom_mere, Nationalité , Telephone_personnel, classe_actuelle, actif, annee_encours) values ('Seamons', 'Andriette', 'Andriette Seamons', 'Andriette Seamons', 'Sweden', '+46 (675) 373-4718', 48, true, '2021/2022');
insert into etudiants (Nom_etudiant, prenom_etudiant, Nom_pere, Nom_mere, Nationalité , Telephone_personnel, classe_actuelle, actif, annee_encours) values ('Cordy', 'Pascale', 'Pascale Cordy', 'Pascale Cordy', 'Madagascar',  '+261 (700) 867-5057', 49, false, '2021/2022');
insert into etudiants (Nom_etudiant, prenom_etudiant, Nom_pere, Nom_mere, Nationalité , Telephone_personnel, classe_actuelle, actif, annee_encours) values ('Vinton', 'Corabelle', 'Corabelle Vinton', 'Corabelle Vinton', 'Philippines', '+63 (641) 585-8631', 50, false, '2020/2021');



insert into modules (code_module, nom_module, duree_heures, filiere, id_officiel) values (1, 'Sonsing', 2, 4, 1);
insert into modules (code_module, nom_module, duree_heures, filiere, id_officiel) values (2, 'Biodex', 1, 4, 2);
insert into modules (code_module, nom_module, duree_heures, filiere, id_officiel) values (3, 'Hatity', 2, 3, 3);
insert into modules (code_module, nom_module, duree_heures, filiere, id_officiel) values (4, 'Cardguard', 2, 3, 4);
insert into modules (code_module, nom_module, duree_heures, filiere, id_officiel) values (5, 'Zamit', 2, 5, 5);
insert into modules (code_module, nom_module, duree_heures, filiere, id_officiel) values (6, 'Veribet', 3, 5, 6);



insert into personnel (CodePersonnel, NomPersonnel, PrenomPersonnel, Professeur, emailPersonnel, adressePersonnel) values (1, 'Alvis', 'Petrishchev', true, 'apetrishchev0@ocn.ne.jp', '22 Knutson Drive');
insert into personnel (CodePersonnel, NomPersonnel, PrenomPersonnel, Professeur, emailPersonnel, adressePersonnel) values (2, 'Courtney', 'Stayte', false, 'cstayte1@shinystat.com', '8931 Dayton Circle');
insert into personnel (CodePersonnel, NomPersonnel, PrenomPersonnel, Professeur, emailPersonnel, adressePersonnel) values (3, 'Dene', 'How', true, 'dhow2@mayoclinic.com', '91 New Castle Court');
insert into personnel (CodePersonnel, NomPersonnel, PrenomPersonnel, Professeur, emailPersonnel, adressePersonnel) values (4, 'Jeremy', 'Davys', false, 'jdavys3@ted.com', '7 Chinook Lane');
insert into personnel (CodePersonnel, NomPersonnel, PrenomPersonnel, Professeur, emailPersonnel, adressePersonnel) values (5, 'Taryn', 'Sprull', true, 'tsprull4@parallels.com', '50281 Goodland Circle');
insert into personnel (CodePersonnel, NomPersonnel, PrenomPersonnel, Professeur, emailPersonnel, adressePersonnel) values (6, 'Hal', 'Odd', false, 'hodd5@unicef.org', '02 Westend Court');
