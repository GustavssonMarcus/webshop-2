import mysql from 'mysql2/promise';
import {config} from 'dotenv';

config()

export const connection = await mysql.createConnection({
    host: process.env.HOST,
    user: process.env.USER,
    password: process.env.PASSWORD,
    database: process.env.DATABASE
});