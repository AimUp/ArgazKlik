CREATE TABLE Erabiltzaileak (
	Nickname varchar(20) NOT NULL,
	Eposta varchar(100) NOT NULL UNIQUE,
	IzenAbizenak varchar(100) NOT NULL,
	Pasahitza varchar(40) NOT NULL,
	Argazkia blob NOT NULL,
	Mota enum('bazkidea','administraria') NOT NULL,
	PRIMARY KEY (Nickname)
);
CREATE TABLE Albumak (
	ID int(10) NOT NULL AUTO_INCREMENT,
	Izena varchar(50) NOT NULL,
	Egilea varchar(20) NOT NULL,
	Eskuragarritasuna enum('pribatua','atzipenMugatua','publikoa','custom') NOT NULL,
	SorreraData timestamp NOT NULL,
	PRIMARY KEY (ID),
	FOREIGN KEY (Egilea) REFERENCES Erabiltzaileak (Nickname)
);
CREATE TABLE AlbumAtzipenZerrenda (
	AlbumID int(10) NOT NULL,
	Nickname varchar(20) NOT NULL,
	PRIMARY KEY (AlbumID,Nickname),
	FOREIGN KEY (AlbumID) REFERENCES Albumak (ID),
	FOREIGN KEY (Nickname) REFERENCES Erabiltzaileak (Nickname)
);
CREATE TABLE Argazkiak (
	ID int(10) NOT NULL AUTO_INCREMENT,
	Argazkia blob NOT NULL,
	Egilea varchar(20) NOT NULL,
	AlbumID int(10) NOT NULL,
	Eskuragarritasuna enum('pribatua','atzipenMugatua','publikoa','custom') NOT NULL,
	IgoeraData timestamp NOT NULL,
	Deskribapena varchar(500),
	PRIMARY KEY (ID),
	FOREIGN KEY (Egilea) REFERENCES Erabiltzaileak (Nickname),
	FOREIGN KEY (AlbumID) REFERENCES Albumak (ID)
);
CREATE TABLE ArgazkiAtzipenZerrena (
	ArgazkiID int(10) NOT NULL,
	Nickname varchar(20) NOT NULL,
	PRIMARY KEY (ArgazkiID,Nickname),
	FOREIGN KEY (ArgazkiID) REFERENCES Argazkiak (ID),
	FOREIGN KEY (Nickname) REFERENCES Erabiltzaileak (Nickname)
);
CREATE TABLE TagHitza (
	ID int(10) NOT NULL AUTO_INCREMENT,
	ArgazkiID int(10) NOT NULL,
	Hitza varchar(50) NOT NULL,
	PRIMARY KEY (ID),
	FOREIGN KEY (ArgazkiID) REFERENCES Argazkiak (ID)
);
CREATE TABLE TagLekua (
	ID int(10) NOT NULL AUTO_INCREMENT,
	ArgazkiID int(10) NOT NULL,
	Lekua varchar(255) NOT NULL,
	PRIMARY KEY (ID),
	FOREIGN KEY (ArgazkiID) REFERENCES Argazkiak (ID)
);
CREATE TABLE TagPertsona (
	ID int(10) NOT NULL AUTO_INCREMENT,
	ArgazkiID int(10) NOT NULL,
	Nickname varchar(20) NOT NULL,
	PRIMARY KEY (ID),
	FOREIGN KEY (ArgazkiID) REFERENCES Argazkiak (ID),
	FOREIGN KEY (Nickname) REFERENCES Erabiltzaileak (Nickname)	
);
