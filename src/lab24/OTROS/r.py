
# Diccionario
P = {}

# Lee los datos del archivo
with open("Prueba.txt") as f:
    w = f.readline() 
    for line in f:
       key, val1, val2 = line.split()
       # Permite a key guardar una lista
       P.setdefault(key, []).append(val1)
       P.setdefault(key, []).append(val2)
       

# Guarda longitud de la cadena sin espacios en blanco
w = w.strip()
n = len(w)

# Matriz de n x n
T = [['0' for x in range(n)] for y in range(n)] 
T[0][4] = 'S'


# Llena la matriz en y = 0
for i in range(n):       
    for p in P: 
        if w[i] in P[p]:
            if T[i][0] == '0':
                T[i][0] = ''
            T[i][0] += p 