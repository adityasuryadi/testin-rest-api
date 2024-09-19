<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    X<input type="text" id="awal">
    Y<input type="text" id="akhir">
    <input type="button" id="proses" value="proses">
</body>
<script>
    var awal = document.getElementById('awal').value
    var akhir = document.getElementById('akhir').value


    document.getElementById('proses').addEventListener('click', function(){
        var tmp = document.getElementById('awal').value.split('')
        var tmp2 = []
        var panjang = document.getElementById('awal').value.length
        for(let i = 0; i <= panjang; i++){
            tmp2.push(tmp[i])
            console.warn(i)
        }

        // x = tmp[1]
        // w = tmp[2]
        // y = tmp[panjang - 2]
        // z = tmp[panjang - 4]

        // console.log(tmp[3])

        // tmp[1] = y
        // tmp[panjang - 2] = x
        // tmp[2] = z
        // tmp[panjang - 4] = w
            
        // console.log(tmp)

        // document.getElementById('akhir').value = tmp.join("").toString()
    })
</script>
</html>