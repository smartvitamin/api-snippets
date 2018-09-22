from flask import Flask, request, redirect
from twilio.twiml.messaging_response import MessagingResponse

app = Flask(__name__)

@app.route("/sms", methods=['GET', 'POST'])
def sms_reply():
    """Respond to incoming calls with a simple text message."""
    # Start our TwiML response
    resp = MessagingResponse()

    # Add a message
    resp.message("Thanks for messaging back. If you have a question please email me at olivia@servicepetverfied.com. I look forward to assiting you with your pet's ESA needs.")

     # Add a message
    resp.message("I won't text message very often but if you would like to be removed reply STOP. Msg@Data Rates May Apply")

    return str(resp)

if __name__ == "__main__":
    app.run(debug=True)
