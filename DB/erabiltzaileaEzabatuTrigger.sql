DELIMITER //
DROP TRIGGER IF EXISTS erabiltzaileaEzabatu //
CREATE TRIGGER erabiltzaileaEzabatu
BEFORE DELETE ON erabiltzaileak FOR EACH ROW
BEGIN
	DELETE FROM tagpertsona WHERE Nickname = OLD.Nickname;
	DELETE FROM argazkiak WHERE Egilea = OLD.Nickname;
	DELETE FROM albumak WHERE Egilea = OLD.Nickname;	
	DELETE FROM albumatzipenzerrenda WHERE Nickname = OLD.Nickname;
	DELETE FROM argazkiatzipenzerrenda WHERE Nickname = OLD.Nickname;
END; //