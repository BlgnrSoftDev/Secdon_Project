USE `SECDON`;

INSERT INTO `Company` (`company_name`, `company_short_desc`, `company_pp`)
	VALUES 
			('Lösev', "Lösemili Çocuklar Sağlık ve Eğitim Vakfı (LÖSEV)[2], 1998 yılında Pediatrik Hematolog, Onkolog Dr. Üstün Ezer tarafından Ankara'da kurulan, lösemili ve kanser hastası çocuk ve yetişkinlere yardımda bulunan ve birçok ihtiyacını karşılayan bir vakıftır", './images/losev.jpg'),
            ('Darüşşafaka', 'Türkiye’nin eğitim alanındaki ilk sivil toplum kuruluşu olarak 1863 yılında faaliyete geçen Darüşşafaka Cemiyeti tarafından kurulmuştur. Kelime anlamı "Şefkat yuvası" olan kurumda, babası veya annesi hayatta olmayan, maddi olanakları yetersiz, sınavla seçilmiş öğrencilere dokuz yıllık, tam burslu, yatılı öğrenim verilmektedir.', './images/darussafaka.jpg'),
            ('Tema', 'TEMA Vakfı, erozyonla mücadele ve doğal varlıklarımızı koruma amacıyla kurulan ve bugün 1 milyonu aşkın gönüllüsü bulunan bir halk hareketidir', './images/tema.jpg'),
            ('Yeşilay', 'Yeşilay, sigara, alkollü içki ve diğer uyuşturucu gibi alışkanlıklar ile mücadele eden ve bütün zararlı alışkanlıklardan halkın ve bilhassa gençlerin korunması için yaptığı çalışmalarla kamuya hizmet veren bu sebeple de Kamuya Yararlı Cemiyetler arasında yer alan bir kurumdur', './images/yesilay.jpg');


SELECT * FROM `Company`;
DESC `Company`;