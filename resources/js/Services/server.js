import axios from "axios";

export const urlBaseApi = import.meta.env.VITE_BASE_API;
export const urlBase = import.meta.env.VITE_BASE_URL;

export const api = axios.create({
    // ONLINE
    // baseURL: "http://159.203.69.144:38000/api/v1/",
    baseURL: import.meta.env.VITE_BASE_URL,
});

export default api