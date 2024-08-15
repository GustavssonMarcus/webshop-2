import express from 'express';
import { connection } from './db/dbconnection.js';

const app = express();
const port = 3000;

app.use(express.json());
app.use(express.urlencoded({ extended: true }));

app.get('/', async (req, res) => {


    const [result] = await connection.query('SELECT * FROM coop')

    res.send(result)
});

app.post('/post', async (req, res) => {
    const {name, price, img} = req.body;
    const [result] = await connection.query('INSERT INTO coop (name, price, img) VALUES (?, ?, ?)', [name, price, img]);

    res.send({result});
})

app.put('/put/:id', async (req, res) => {
    const { id } = req.params;
    const { name, price, img } = req.body;

    try {
        const [result] = await connection.query(
            'UPDATE coop SET name = ?, price = ?, img = ? WHERE id = ?',
            [name, price, img, id]
        );

        if (result.affectedRows > 0) {
            res.send({ message: `Post with id ${id} updated successfully.` });
        } else {
            res.status(404).send({ message: `Post with id ${id} not found.` });
        }
    } catch (error) {
        res.status(500).send({ message: 'Error updating the post', error });
    }
});

app.delete('/delete/:id', async (req, res) => {
    const { id } = req.params;

    try {
        const [result] = await connection.query('DELETE FROM coop WHERE id = ?', [id]);

        if (result.affectedRows > 0) {
            res.send({ message: `Post with id ${id} deleted successfully.` });
        } else {
            res.status(404).send({ message: `Post with id ${id} not found.` });
        }
    } catch (error) {
        res.status(500).send({ message: 'Error deleting the post', error });
    }
});

app.listen(port, () => {
    console.log(`Server running on http://localhost:${port}`);
});