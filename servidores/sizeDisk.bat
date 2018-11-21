cd C:\xampp\htdocs\Check\servidores
wmic /node:10.156.113.33 /user:.\administrador /password:PR3S1D3NT3 logicaldisk where DeviceID='C:' get size > espacio.txt