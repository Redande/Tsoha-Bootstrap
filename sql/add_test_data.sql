INSERT INTO Account (username, password) VALUES ('Antti', 'qwerty123');

INSERT INTO Hahmo (nimi) VALUES ('Natures Prophet');
INSERT INTO Hahmo (nimi) VALUES ('Terrorblade');
INSERT INTO Hahmo (nimi) VALUES ('Lycanthrope');
INSERT INTO Hahmo (nimi) VALUES ('Shadow Shaman');
INSERT INTO Hahmo (nimi) VALUES ('Lone Druid');

INSERT INTO Rooli (nimi, kuvaus) VALUES ('Jungler', 'Farm in jungle early phase, then start to roam gank or help push towers');
INSERT INTO Rooli (nimi, kuvaus) VALUES ('Carry', 'Farm early and mid phase, then start to participate in team fights and pushing');

INSERT INTO Liitos (hahmo, roolit) VALUES (1, 1);
INSERT INTO Liitos (hahmo, roolit) VALUES (1, 2);