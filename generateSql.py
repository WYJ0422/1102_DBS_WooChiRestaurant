
p_name = ["抖宅", "發財", "魯魯", "歐卡", "咪咪", "布丁", "阿肥", "噗呲", "阿努", "布布", "可樂", "黏黏", "饅頭", "麥迪沙", "芬達", "肉包"]
photo = [
    "../static/img/pets/抖宅.jpg",
    "../static/img/pets/發財.jpg",
    "../static/img/pets/魯魯.jpg",
    "../static/img/pets/歐卡.jpg",
    "../static/img/pets/咪咪.jpg",
    "../static/img/pets/布丁.jpg",
    "../static/img/pets/阿肥.jpg",
    "../static/img/pets/噗呲.jpg",
    "../static/img/pets/阿努.jpg",
    "../static/img/pets/布布.jpg",
    "../static/img/pets/可樂.jpg",
    "../static/img/pets/黏黏.jpg",
    "../static/img/pets/饅頭.jpg",
    "../static/img/pets/麥迪沙.jpg",
    "../static/img/pets/芬達.jpg",
    "../static/img/pets/肉包.jpg"
]
gender = ["母", "公", "母", "公", "母", "公", "母", "公", "公", "公", "母", "公", "母", "公", "母", "母",]
age = ["2", "3", "1", "1", "1", "5", "2", "3", "1", "4", "5", "3", "2", "3", "6", "1"]
size = ["小型犬", "中型犬", "中型犬", "小型犬", "小型犬", "小型犬", "小型犬", "小型犬", "小型貓", "小型貓", "小型貓", "小型貓", "小型貓", "小型貓", "小型貓", "小型貓"]
variety = ["法鬥", "柴犬", "米克斯", "臘腸", "馬爾濟斯", "貴賓", "柯基", "吉娃娃", "貍花貓", "波斯貓", "豹貓", "短毛貓", "摺耳貓", "布偶貓", "藍貓"]
p_description = [
    "人人好、愛睡覺、喜歡咬玩具",
    "活潑好動、學習能力強、喜歡吃零食",
    "會護食、適應能力高、喜歡戶外奔跑",
    "溫馴親人、傻裡傻氣、喜歡散步",
    "愛吠叫、好奇心強、愛乾淨喜歡洗澡",
    "會爭寵、聰明伶俐、有些神經質",
    "愛咬玩具、易受驚嚇、喜歡跟著人",
    "不愛與狗狗互動、愛吃零食、易受驚嚇",
    "好奇心強、愛玩玩具、活潑好動",
    "有些神經質、傲嬌、厭世感重",
    "溫和冷靜、親人、喜歡發呆",
    "黏人愛撒嬌、貪吃不挑食、喜歡玩耍",
    "膽小怕生、愛睡覺、黏人愛撒嬌",
    "溫馴親人、好奇心強、喜歡玩玩具",
    "溫馴親人、愛乾淨、喜歡被摸",
    "會護食、適應能力強、好奇心強",
    ]
microchip = ["Y", "N", "Y", "N", "N", "Y", "N", "Y", "N", "Y", "Y", "N", "Y", "N", "Y", "Y"]
ligation = ["Y", "Y", "N", "N", "N", "Y", "N", "Y", "Y", "Y", "N", "N", "Y", "Y", "N", "Y"]
type = ["狗", "狗", "狗", "狗", "狗", "狗", "狗", "狗", "貓", "貓", "貓", "貓", "貓", "貓", "貓", "貓"]

for i in range(16):
    #sql = f"INSERT INTO pets(u_id, p_name, photo, gender, age, size, variety, p_description, microchip, ligation, type) VALUES (1,{p_name},{photo},{gender},{age},{size},{variety},{p_description},{microchip},{ligation},{type});"
    sql = f"INSERT INTO pets(u_id, p_name, photo, gender, age, size, variety, p_description, microchip, ligation, type) VALUES (1,{p_name},{photo},{gender},{age},{size},{variety},{p_description},{microchip},{ligation},{type});"
print(sql)