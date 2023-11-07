ALTER TABLE RATE
ADD r_reply TEXT;

UPDATE PETS
SET Size = '小型貓'
WHERE Size = '貓';

UPDATE `restaurant` SET `description` = '屋吉寵物友善餐廳位於台中西屯區，附近非常好停車。<br>它不僅是一間寵物友善餐廳，更是一間浪浪的中途學校！希望可以給牠們一個家。<br>店內不只有各式美味的料理，還有超級可愛的毛小孩們～<br>想要領養的人也一定要衡量自己有沒有時間金錢把孩子帶好喔!' WHERE `restaurant`.`u_id` = 1;