import requests

url = "http://127.0.0.1:8000/api/peixes"
headers = {'Accept': 'application/json'}

try:
    response = requests.get(url, headers=headers)
    if response.status_code == 200:
        print("=== CONSUMO DA API REALIZADO COM SUCESSO ===")
        print(response.json())
    else:
        print(f"Erro ao conectar na API: {response.status_code}")
except Exception as e:
    print(f"Erro de conexão: {e}")