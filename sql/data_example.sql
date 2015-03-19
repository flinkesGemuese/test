-- Vorläufige Daten für Gewürzheini.de Datenbank. Meist Platzhalter

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

SET NAMES 'utf8';
USE webshop;

INSERT INTO shop_category VALUES
(1, 'Gewürze', 0, 'Gewürze'),
(2, 'Zubehör', 0, 'Zubehör für echte Gewürzgourmets'),
(3, 'Merchandise', 0, 'Gewürzheini.de Fan-Artikel'),
(4, 'Tee', 0, 'Verschiede Teesorten'),
(5, 'Sonstiges', 0, 'Sonstiges'),
(100, 'Salz', 1, 'Tafelsalze'),
(101, 'Pfeffer', 1, 'Pfeffersorten'),
(102, 'Exotische Gewürze', 1, 'Exotische Gewürze und Gewürzmischungen');

INSERT INTO shop_item VALUES
(1, 'Tafelsalz', 'http://upload.wikimedia.org/wikipedia/commons/thumb/c/ca/Speisesalz.jpg/1280px-Speisesalz.jpg', '<p><b>Speisesalz</b>, <b>Kochsalz</b> oder <b>Tafelsalz</b> (<a href="/wiki/Umgangssprache" title="Umgangssprache">umgangssprachlich</a> einfach „Salz“) ist das in der Küche für die menschliche <a href="/wiki/Ern%C3%A4hrung" title="Ernährung">Ernährung</a> verwendete <a href="/wiki/Salze" title="Salze">Salz</a>. Es besteht hauptsächlich aus <a href="/wiki/Natriumchlorid" title="Natriumchlorid">Natriumchlorid</a>.</p>', 'Tafelsalz, 1kg packung', 0.99, 100),
(2, 'Schwarzer Pfeffer', 'https://demoshop.jtl-software.de/bilder/produkte/gross/Schwarzer-Pfeffer.jpg', '<p>Der <b>Pfefferstrauch</b> (<i>Piper nigrum</i>), auch <b>Schwarzer Pfeffer</b> oder kurz <b>Pfeffer</b> genannt, ist eine <a href="/wiki/Art_(Biologie)" title="Art (Biologie)">Pflanzenart</a> aus der <a href="/wiki/Familie_(Biologie)" title="Familie (Biologie)">Familie</a> der <a href="/wiki/Pfeffergew%C3%A4chse" title="Pfeffergewächse">Pfeffergewächse</a> (Piperaceae). Die Früchte werden wegen des darin enthaltenen <a href="/wiki/Alkaloid" title="Alkaloid" class="mw-redirect">Alkaloids</a> <a href="/wiki/Piperin" title="Piperin">Piperin</a> als <a href="/wiki/Geschmackliche_Sch%C3%A4rfe" title="Geschmackliche Schärfe">scharf schmeckendes</a> <a href="/wiki/Gew%C3%BCrz" title="Gewürz">Gewürz</a> verwendet. Zur Unterscheidung von ähnlichen Gewürzen spricht man auch vom <b>echten Pfeffer</b>.</p>', 'Schwarzer Pfeffer, 50g Packung', 1.29, 101);

INSERT INTO shop_stock VALUES
(1, 1000),
(2, 1337);

INSERT INTO users VALUES
(1, 'admin', 'admin@admin.com', 2, 'Admin', 'Adminovich', 'Adminstraße, 2', 38110, 'Braunschweig', '1982-02-20'),
(2, 'maxmustermann', 'max.mustermann@gmail.com', 0, 'Max', 'Mustermann', 'Musterstraße 1', 22222, 'Babelsberg', '1990-01-01'),
(3, 'manmustermann', 'manuelamustermann@gmail.com', 0, 'Manuela', 'Mustermann', 'Musterstraße 2', 22222, 'Babelsberg', '2976-01-01');

/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;