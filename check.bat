md C:\xampp\htdocs\Check\archivosTXT\%Date:~6,4%-%Date:~3,2%-%Date:~0,2%
cd C:\xampp\htdocs\Check\archivosTXT\%Date:~6,4%-%Date:~3,2%-%Date:~0,2%
wmic /node:10.156.113.12 /user:.\dg /password:pr3s1d3nt3 logicaldisk where DeviceID='C:' get freespace > C_SRVGDLPMS01%Date:~6,4%-%Date:~3,2%-%Date:~0,2%.txt
wmic /node:10.156.113.12 /user:.\dg /password:pr3s1d3nt3 logicaldisk where DeviceID='D:' get freespace > D_SRVGDLPMS01%Date:~6,4%-%Date:~3,2%-%Date:~0,2%.txt
wmic /node:10.156.113.12 /user:.\dg /password:pr3s1d3nt3 logicaldisk where DeviceID='G:' get freespace > G_SRVGDLPMS01%Date:~6,4%-%Date:~3,2%-%Date:~0,2%.txt
wmic /node:10.156.113.12 /user:.\dg /password:pr3s1d3nt3 logicaldisk where DeviceID='Z:' get freespace > Z_SRVGDLPMS01%Date:~6,4%-%Date:~3,2%-%Date:~0,2%.txt
wmic /node:10.156.113.11 /user:.\dg /password:pr3s1d3nt3 logicaldisk where DeviceID='C:' get freespace > C_SRVGDLDG01%Date:~6,4%-%Date:~3,2%-%Date:~0,2%.txt
wmic /node:10.156.113.11 /user:.\dg /password:pr3s1d3nt3 logicaldisk where DeviceID='D:' get freespace > D_SRVGDLDG01%Date:~6,4%-%Date:~3,2%-%Date:~0,2%.txt
wmic /node:10.156.113.11 /user:.\dg /password:pr3s1d3nt3 logicaldisk where DeviceID='Z:' get freespace > Z_SRVGDLDG01%Date:~6,4%-%Date:~3,2%-%Date:~0,2%.txt
wmic /node:10.156.113.52 /user:.\administrator /password:Micros97oo logicaldisk where DeviceID='C:' get freespace > C_SRVGDLPOS01%Date:~6,4%-%Date:~3,2%-%Date:~0,2%.txt
wmic /node:10.156.113.52 /user:.\administrator /password:Micros97oo logicaldisk where DeviceID='D:' get freespace > D_SRVGDLPOS01%Date:~6,4%-%Date:~3,2%-%Date:~0,2%.txt
wmic /node:10.156.113.52 /user:.\administrator /password:Micros97oo logicaldisk where DeviceID='F:' get freespace > F_SRVGDLPOS01%Date:~6,4%-%Date:~3,2%-%Date:~0,2%.txt
wmic /node:10.156.113.161 /user:.\administrador /password:S0pran0s logicaldisk where DeviceID='C:' get freespace > C_GDL_INTERFACES%Date:~6,4%-%Date:~3,2%-%Date:~0,2%.txt
wmic /node:10.156.113.161 /user:.\administrador /password:S0pran0s logicaldisk where DeviceID='D:' get freespace > D_GDL_INTERFACES%Date:~6,4%-%Date:~3,2%-%Date:~0,2%.txt
wmic /node:10.156.113.47 /user:mexhadmn\gdlha_tarificador /password:Reserva18 logicaldisk where DeviceID='C:' get freespace > C_SRVGDLTAR%Date:~6,4%-%Date:~3,2%-%Date:~0,2%.txt
wmic /node:10.156.113.47 /user:mexhadmn\gdlha_tarificador /password:Reserva18 logicaldisk where DeviceID='D:' get freespace > D_SRVGDLTAR%Date:~6,4%-%Date:~3,2%-%Date:~0,2%.txt
wmic /node:10.156.113.45 /user:.\administrador /password:pr3s1d3nt3 logicaldisk where DeviceID='C:' get freespace > C_SRVGDLVINGCARD%Date:~6,4%-%Date:~3,2%-%Date:~0,2%.txt
wmic /node:10.156.113.45 /user:.\administrador /password:pr3s1d3nt3 logicaldisk where DeviceID='D:' get freespace > D_SRVGDLVINGCARD%Date:~6,4%-%Date:~3,2%-%Date:~0,2%.txt
wmic /node:10.156.113.45 /user:.\administrador /password:pr3s1d3nt3 logicaldisk where DeviceID='E:' get freespace > E_SRVGDLVINGCARD%Date:~6,4%-%Date:~3,2%-%Date:~0,2%.txt
wmic /node:10.156.113.162 /user:.\administrador /password:pr3s1d3nt3 logicaldisk where DeviceID='C:' get freespace > C_SRVGDLSVT01%Date:~6,4%-%Date:~3,2%-%Date:~0,2%.txt
wmic /node:10.156.113.162 /user:.\administrador /password:pr3s1d3nt3 logicaldisk where DeviceID='D:' get freespace > D_SRVGDLSVT01%Date:~6,4%-%Date:~3,2%-%Date:~0,2%.txt
wmic /node:10.156.113.112 /user:.\administrador /password:pr3s1d3nt3 logicaldisk where DeviceID='C:' get freespace > C_SRVGDLWSUS%Date:~6,4%-%Date:~3,2%-%Date:~0,2%.txt
wmic /node:10.156.113.112 /user:.\administrador /password:pr3s1d3nt3 logicaldisk where DeviceID='D:' get freespace > D_SRVGDLWSUS%Date:~6,4%-%Date:~3,2%-%Date:~0,2%.txt
wmic /node:10.156.113.112 /user:.\administrador /password:pr3s1d3nt3 logicaldisk where DeviceID='E:' get freespace > E_SRVGDLWSUS%Date:~6,4%-%Date:~3,2%-%Date:~0,2%.txt
wmic /node:10.156.113.112 /user:.\administrador /password:pr3s1d3nt3 logicaldisk where DeviceID='G:' get freespace > G_SRVGDLWSUS%Date:~6,4%-%Date:~3,2%-%Date:~0,2%.txt
systeminfo /s 10.156.113.12 /u .\dg /p pr3s1d3nt3 | find "Tiempo" > SRVGDLPMS01_T_%Date:~6,4%-%Date:~3,2%-%Date:~0,2%.txt
systeminfo /s 10.156.113.11 /u .\dg /p pr3s1d3nt3 | find "Tiempo" > SRVGDLDG01_T_%Date:~6,4%-%Date:~3,2%-%Date:~0,2%.txt
systeminfo /s 10.156.113.52 /u .\administrator /p Micros97oo | find "Tiempo" > SRVGDLPOS01_T_%Date:~6,4%-%Date:~3,2%-%Date:~0,2%.txt
systeminfo /s 10.156.113.161 /u .\administrador /p S0pran0s | find "Tiempo" > GDL_INTERFACES_T_%Date:~6,4%-%Date:~3,2%-%Date:~0,2%.txt
systeminfo /s 10.156.113.47 /u mexhadmn\gdlha_tarificador /p Reserva18 | find "Tiempo" > SRVGDLTAR_T_%Date:~6,4%-%Date:~3,2%-%Date:~0,2%.txt
systeminfo /s 10.156.113.45 /u .\administrador /p pr3s1d3nt3 | find "Tiempo" > SRVGDLVINGCARD_T_%Date:~6,4%-%Date:~3,2%-%Date:~0,2%.txt
systeminfo /s 10.156.113.162 /u .\administrador /p pr3s1d3nt3 | find "Tiempo" > SRVGDLSVT01_T_%Date:~6,4%-%Date:~3,2%-%Date:~0,2%.txt
systeminfo /s 10.156.113.112 /u .\administrador /p pr3s1d3nt3 | find "Tiempo" > SRVGDLWSUS_T_%Date:~6,4%-%Date:~3,2%-%Date:~0,2%.txt
systeminfo /s 10.156.113.192 /u .\administrador /p pr3s1d3nt3 | find "Tiempo" > GDLHA_OPERADORA_T_%Date:~6,4%-%Date:~3,2%-%Date:~0,2%.txt
