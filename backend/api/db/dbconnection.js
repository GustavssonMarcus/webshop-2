import path from "path";
import dotenv from 'dotenv';
import { fileURLToPath } from 'node:url';
console.log(path.dirname(fileURLToPath(import.meta.url)));
dotenv.config({ path: path.resolve(path.dirname(fileURLToPath(import.meta.url)), '../.env') });

import mysql from 'mysql2/promise';
// import {config} from 'dotenv';

// config()

export const connection = await mysql.createConnection({
    host: process.env.HOST,
    user: process.env.USER,
    password: process.env.PASSWORD,
    database: process.env.DATABASE,
    port: process.env.DB_PORT
});

