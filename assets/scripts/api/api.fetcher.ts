const apiFetch = async (url: string, options: RequestInit = {}) => {
    const response = await fetch('/api'+url, options);
    return await response.json();
}

export default apiFetch;
