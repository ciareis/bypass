const express = require('express')
const app = express()
const bodyParser = require('body-parser')

const { argv } = process

const port = argv[2]

console.log({ port })

// parse application/json
app.use(bodyParser.json())

app.post('/___start___faker___api', async (req, res) => {
    const { body } = req
    const { method, uri, content, status } = body

    app[method](uri, async (req, res) => {
        console.log('entrou na rota')
        res.statusCode = status
        Promise.resolve("Success").then(function (value) {
            setTimeout(function () {
                throw new Error('Derrubar servidor');
            }, 200)
        }, function (value) {
            // not called
        });

        res.send(content)


        return;
    })
    res.send('Started')
})

app.listen(port, () => {
    console.log('started')
    console.log(`Listen on port ${port}`)
    console.log(`http://localhost:${port}`)
})
