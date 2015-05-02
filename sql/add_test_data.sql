INSERT INTO Account (username, password) VALUES ('Antti', 'qwerty123');

INSERT INTO Hero (name) VALUES ('Natures Prophet');
INSERT INTO Hero (name) VALUES ('Terrorblade');
INSERT INTO Hero (name) VALUES ('Lycanthrope');
INSERT INTO Hero (name) VALUES ('Shadow Shaman');
INSERT INTO Hero (name) VALUES ('Lone Druid');

INSERT INTO Role (name, description) VALUES ('Jungler', 'Farm in jungle early phase, then start to roam gank or help push towers');
INSERT INTO Role (name, description) VALUES ('Carry', 'Farm early and mid phase, then start to participate in team fights and pushing');

INSERT INTO JoinTable (hero, role) VALUES (1, 1);
INSERT INTO JoinTable (hero, role) VALUES (1, 2);