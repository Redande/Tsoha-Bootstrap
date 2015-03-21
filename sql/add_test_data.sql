INSERT INTO Kayttaja (kayttajatunnus, salasana) VALUES ('Antti', 'qwerty123');

INSERT INTO Joukkue (nimi, kayttaja) VALUES ('Ratpush', 1);

INSERT INTO Hahmo (nimi) VALUES ('Natures Prophet');
INSERT INTO Hahmo (nimi) VALUES ('Terrorblade');
INSERT INTO Hahmo (nimi) VALUES ('Lycanthrope');
INSERT INTO Hahmo (nimi) VALUES ('Shadow Shaman');
INSERT INTO Hahmo (nimi) VALUES ('Lone Druid');

INSERT INTO Liitos1 (joukkue, sankarit) VALUES (1, 1);
INSERT INTO Liitos1 (joukkue, sankarit) VALUES (1, 2);
INSERT INTO Liitos1 (joukkue, sankarit) VALUES (1, 3);
INSERT INTO Liitos1 (joukkue, sankarit) VALUES (1, 4);
INSERT INTO Liitos1 (joukkue, sankarit) VALUES (1, 5);

INSERT INTO Rooli (nimi, kuvaus) VALUES ('Jungler', 'Farm in jungle early phase, then start to roam gank or help push towers');
INSERT INTO Rooli (nimi, kuvaus) VALUES ('Carry', 'Farm early and mid phase, then start to participate in team fights and pushing');

INSERT INTO Liitos2 (hahmo, roolit) VALUES (1, 1);
INSERT INTO Liitos2 (hahmo, roolit) VALUES (1, 2);

INSERT INTO Esine (nimi, hinta, kuvaus) VALUES ('Iron Branch', 50, '+1 Strength, +1 Agility, +1 Intelligence');

INSERT INTO TAITO (nimi, kuvaus, manacost, hahmo, esine) VALUES ('Natures Call', 'Converts an area of trees into Treants.', 160, 1, NULL);
