# Uno Game 

# Link
 https://users.iee.ihu.gr/~it154582/Uno-Game-AlexMelissas


# Technologies Used

1. Vanilla PHP
2. Mysql
3. Bootstrap 4
4. Jquery (AJAX calls)

# API 


URL | METHOD |ACTION | RETURN STATUS 
--- | --- | --- | ---  
/board | GET | Επιστρέφει σε json την τρέχουσα μορφή του board. |  200 (OK) , 400 (Bad Request) 
/board | POST | Κάνει reset το board στην αρχική κατάσταση και επιστρέφει την τρέχουσα μορφή του παιχνιδιού σε json. | 200 (OK) , 400 (Bad Request) 
/board/card/C | GET | Επιστρέφει σε json τις πληροφορίες της κάρτας C.  | 200 (OK) , 400 (Bad Request) 
/board/card/C | PUT | Ρίχνει την κάρτα С στο τραπέζι. | 200 (OK) , 400 (Bad Request) 
/board/player/P | GET | Επιστρέφει σε json το nickname του παίκτη p(player1,player2). | 200 (OK) , 400 (Bad Request)  
/board/players | GET | Επιστρέφει σε json τα στοιχεία των παικτών του παιχνιδιού. | 200 (OK) , 400 (Bad Request) 
/board/draw | PUT | Ο παίκτης που έχει σειρά τραβάει μία κάρτα. | 200 (OK) , 400 (Bad Request) 
/board/paso | PUT | Δίνει την σειρά στον αντίπαλο παίκτη. | 200 (OK) , 400 (Bad Request) 
/board/uno | PUT | Με αυτό ο παίκτης λέει UNO. | 200 (OK) , 400 (Bad Request) 
/board/game | GET | Επιστρέφει σε json την κατάσταση του παιχνιδιού. | 200 (OK) , 400 (Bad Request) 


# Created by:

# Alexandros Melissas
