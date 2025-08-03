const functions = require("firebase-functions");
const Xendit = require("xendit-node");

exports.createInvoice = functions.https.onRequest(async (req, res) => {
  try {
    const x = new Xendit({
      secretKey: 'xnd_development_pfe0vF2itCvW8g0FmngJDp2ZnIO1IUKZqSMez2LpqXu1XKaYJQz2kCv32IwxXEH',
    });

    const { Invoice } = x;
    const i = new Invoice();

    const resp = await i.createInvoice({
      externalID: 'invoice-' + Date.now(),
      payerEmail: 'budi@example.com',
      description: 'Pembayaran Kacamata',
      amount: 600000,
    });

    res.status(200).json({
      invoice_url: resp.invoice_url,
      id: resp.id,
    });
  } catch (error) {
    console.error("Xendit error:", error);
    res.status(500).send("Gagal membuat invoice");
  }
});
