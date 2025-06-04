<div class="flex flex-col justify-center items-center h-screen bg-gradient-to-br from-indigo-900 via-purple-900 to-slate-900 text-slate-100">
    <div class="bg-slate-800 p-10 rounded-xl shadow-2xl border border-slate-700 flex flex-col md:flex-row space-y-8 md:space-y-0 md:space-x-10">

        <div class="flex flex-col space-y-6 items-center">
            <div class="bg-slate-700 p-6 rounded-lg shadow-xl w-72">
                <h1 id="clock" class="text-teal-400 text-5xl font-bold mb-3 text-center">00:00:00</h1>
                <p class="text-center text-xl font-medium {{ str_contains($type, 'in') ? 'text-green-400' : 'text-red-400' }}">{{ strtoupper($type) }}</p>
            </div>

            <div class="grid grid-cols-2 gap-5 w-72">
                <button x-on:click="$wire.set('type','check-in')" class="bg-green-500 hover:bg-green-400 text-green-950 font-bold py-3 px-4 rounded-lg shadow-lg transform hover:scale-105 transition-all duration-200 ease-in-out">
                    Check In
                </button>
                <button x-on:click="$wire.set('type','check-out')" class="bg-red-500 hover:bg-red-400 text-red-950 font-bold py-3 px-4 rounded-lg shadow-lg transform hover:scale-105 transition-all duration-200 ease-in-out">
                    Check Out
                </button>
                <button x-on:click="$wire.set('type','overtime-check-in')" class="bg-sky-500 hover:bg-sky-400 text-sky-950 font-bold py-3 px-4 rounded-lg shadow-lg transform hover:scale-105 transition-all duration-200 ease-in-out">
                    Check In <br> <i class="font-normal text-sm opacity-90">Overtime</i>
                </button>
                <button x-on:click="$wire.set('type','overtime-check-out')" class="bg-purple-500 hover:bg-purple-400 text-purple-950 font-bold py-3 px-4 rounded-lg shadow-lg transform hover:scale-105 transition-all duration-200 ease-in-out">
                    Check Out <br> <i class="font-normal text-sm opacity-90">Overtime</i>
                </button>
            </div>
            {{-- <flux:button x-on:click="$wire.clockInOut('EBC3C630')">DUMMY ATTENDANCE</flux:button> --}}
        </div>

        <div id="thing" class="bg-slate-700 p-8 rounded-lg shadow-xl flex flex-col items-center justify-center w-72 cursor-pointer hover:bg-slate-600 transition-colors duration-200">
            <p class="text-slate-300 text-center text-lg font-medium mb-6">Tap your card on the scanner below</p>
            <div class="text-teal-400 text-3xl animate-bounce">
                <svg class="w-10 h-10 inline-block" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" fill-rule="evenodd" clip-rule="evenodd"><path d="M11 21.883l-6.235-7.527-.765.644 7.521 9 7.479-9-.764-.645-6.236 7.529v-21.884h-1v21.883z"/></svg>
                <svg class="w-10 h-10 inline-block mx-1" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" fill-rule="evenodd" clip-rule="evenodd"><path d="M11 21.883l-6.235-7.527-.765.644 7.521 9 7.479-9-.764-.645-6.236 7.529v-21.884h-1v21.883z"/></svg>
                <svg class="w-10 h-10 inline-block" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" fill-rule="evenodd" clip-rule="evenodd"><path d="M11 21.883l-6.235-7.527-.765.644 7.521 9 7.479-9-.764-.645-6.236 7.529v-21.884h-1v21.883z"/></svg>
            </div>
        </div>

    </div>

    <p class="my-6 p-4 rounded-lg shadow-lg text-center font-semibold bg-red-800 text-red-100 border border-red-600 w-auto max-w-md" id="important">⚠️⚠️ NOT READY, Call an Admin to rectify this ⚠️⚠️</p>

    <script>
        // Fungsi untuk memulai jam
        function startTime() {
            const today = new Date();
            let h = today.getHours();
            let m = today.getMinutes();
            let s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            const clockElement = document.getElementById('clock');
            if (clockElement.innerHTML !== "SUCCESS") { // Hanya update jika bukan "SUCCESS"
                 clockElement.innerHTML =  h + ":" + m + ":" + s;
            }
            setTimeout(startTime, 1000); // Panggil startTime() setiap 1 detik
        }

        function checkTime(i) {
            if (i < 10) {i = "0" + i};  // tambahkan nol di depan angka < 10
            return i;
        }

        // Inisialisasi jam saat halaman dimuat
        startTime();

        // Event listener untuk elemen 'thing'
        const thingElement = document.querySelector('#thing');
        const importantElement = document.querySelector('#important');
        const clockDisplayElement = document.getElementById('clock');

        thingElement.addEventListener('click', async () => {
            try {
                // Minta pengguna untuk memilih port serial.
                importantElement.innerText = "🔄 Attempting to connect to serial port...";
                importantElement.className = "my-6 p-4 rounded-lg shadow-lg text-center font-semibold bg-sky-800 text-sky-100 border border-sky-600 w-auto max-w-md";

                const port = await navigator.serial.requestPort();

                // Tunggu port serial terbuka.
                await port.open({ baudRate: 9600 });
                
                importantElement.innerText = "✅✅ READY! Tap card or click button to start ✅✅";
                importantElement.className = "my-6 p-4 rounded-lg shadow-lg text-center font-semibold bg-green-800 text-green-100 border border-green-600 w-auto max-w-md";
                
                await startListening(port); // Mengganti nama fungsi agar lebih jelas
                
                // Tidak seharusnya sampai sini kecuali stream ditutup
                // await port.close(); // Port akan ditutup di dalam startListening jika perlu
                // importantElement.innerText = "🔌 Port closed. Click to reconnect.";
                // importantElement.className = "my-6 p-4 rounded-lg shadow-lg text-center font-semibold bg-yellow-800 text-yellow-100 border border-yellow-600 w-auto max-w-md";


            } catch (error) {
                console.error("Error during serial port operation:", error);
                if (error.name === 'NotFoundError' || error.name === 'NotAllowedError') {
                    importantElement.innerText = "🚫 Serial port selection cancelled or not allowed. Click to try again.";
                } else {
                    importantElement.innerText = "❌ Error connecting to serial port. Click to try again.";
                }
                 importantElement.className = "my-6 p-4 rounded-lg shadow-lg text-center font-semibold bg-red-800 text-red-100 border border-red-600 w-auto max-w-md";
            }
        });

        async function startListening(port) {
            const textDecoder = new TextDecoderStream();
            const readableStreamClosed = port.readable.pipeTo(textDecoder.writable);
            const reader = textDecoder.readable.getReader();

            // Dengar data yang datang dari perangkat serial.
            try {
                while (true) {
                    const { value, done } = await reader.read();
                    if (done) {
                        reader.releaseLock();
                        break;
                    }
                    
                    console.log("Raw serial value:", value);
                    
                    try {
                        // Mencoba mengekstrak UID dari format "UID: XXXXXXXX"
                        // Regex disesuaikan agar lebih robust terhadap spasi atau variasi format
                        const match = value.match(/UID:\s*([0-9A-Fa-f]+)/);
                        if (match && match[1]) {
                            let uid = match[1];
                            console.log("Extracted UID:", uid);
                            Livewire.dispatch('clock-fire', [uid,]); // Menggunakan array untuk parameter
                            clockDisplayElement.innerHTML = "<span class='text-green-400'>SUCCESS</span>";
                            
                            importantElement.className = "my-6 p-4 rounded-lg shadow-lg text-center font-semibold bg-green-800 text-green-100 border border-green-600 w-auto max-w-md";
                            
                            // Opsi: Hentikan listening setelah sukses atau biarkan terus berjalan
                            // Jika ingin berhenti setelah satu kali baca sukses:
                            // reader.releaseLock();
                            // await readableStreamClosed.catch(() => { /* Abaikan error saat stream ditutup */ });
                            // await port.close();
                            // importantElement.innerText = "✅ SUCCESS! Port closed. Click to reconnect.";
                            // importantElement.className = "my-6 p-4 rounded-lg shadow-lg text-center font-semibold bg-yellow-800 text-yellow-100 border border-yellow-600 w-auto max-w-md";
                            // return; // Keluar dari fungsi startListening

                        } else {
                            // Jika format UID tidak sesuai, tampilkan nilai mentah di konsol tapi jangan error UI
                            console.log("Non-UID data or malformed UID:", value);
                            // clockDisplayElement.innerHTML = "<span class='text-yellow-400'>WAITING...</span>"; 
                        }
                    } catch (error) {
                        console.error("Error processing serial value:", error.message);
                        // clockDisplayElement.innerHTML = "<span class='text-red-400'>ERROR</span>";
                    }
                }
            } catch (error) {
                console.error("Error reading from serial port:", error);
                importantElement.innerText = "⚠️ Error reading from port. It might have been disconnected.";
                importantElement.className = "my-6 p-4 rounded-lg shadow-lg text-center font-semibold bg-orange-800 text-orange-100 border border-orange-600 w-auto max-w-md";
            } finally {
                // Pastikan port ditutup jika loop berakhir atau ada error tak terduga di luar try-catch internal
                if (port.readable) { // Hanya jika port masih bisa dibaca (belum ditutup)
                    try {
                        await reader.cancel(); // Batalkan reader
                        await readableStreamClosed.catch(() => {}); // Tunggu stream ditutup
                        await port.close();
                        console.log("Port closed in finally block.");
                        if (!importantElement.innerText.includes("SUCCESS")) { // Jangan timpa pesan sukses
                           importantElement.innerText = "🔌 Port closed. Click scanner to reconnect.";
                           importantElement.className = "my-6 p-4 rounded-lg shadow-lg text-center font-semibold bg-yellow-800 text-yellow-100 border border-yellow-600 w-auto max-w-md";
                        }
                    } catch (closeError) {
                        console.error("Error closing port in finally block:", closeError);
                    }
                }
            }
        }
        // Pesan awal di konsol
        if (navigator.serial) {
            console.log("✅ Web Serial API is supported in this browser.");
        } else {
            console.warn("❌ Web Serial API is NOT supported in this browser. The scanner functionality will not work.");
            importantElement.innerText = "❌ Browser not supported. Please use Chrome or Edge (Desktop).";
            importantElement.className = "my-6 p-4 rounded-lg shadow-lg text-center font-semibold bg-red-800 text-red-100 border border-red-600 w-auto max-w-md";
            thingElement.style.display = 'none'; // Sembunyikan area scanner jika API tidak didukung
        }

    </script>
</div>