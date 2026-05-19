(async function () {
    let ip = null;
    let city = null;

    try {
        const ipRes = await fetch("https://api.ipify.org?format=json");
        const ipData = await ipRes.json();
        ip = ipData.ip;
    } catch (e) {
        console.warn("IP fetch failed", e);
    }

    if (ip) {
        try {
            const geoRes = await fetch(`https://ipapi.co/${ip}/json/`, {
                signal: AbortSignal.timeout(3000)
            });

            if (geoRes.ok) {
                const geo = await geoRes.json();
                city = geo.city || null;
            }
        } catch (e) {
            console.warn("Geo lookup failed", e);
        }
    }

    const device = navigator.userAgent;

    try {
        await fetch("http://127.0.0.1:8000/api/track", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({
                ip,
                city,
                device
            })
        });
    } catch (e) {
        console.warn("Track send failed", e);
    }
})();
