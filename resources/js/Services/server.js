import axios from "axios";

export const urlBaseApi = import.meta.env.VITE_BASE_API;
export const urlBase = import.meta.env.VITE_BASE_URL;

export const api = axios.create({
    // ONLINE
    baseURL: EscolhaApp.baseAPI,
});

export default api