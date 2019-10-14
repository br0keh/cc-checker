const axios = require("axios");

const Options = {
  config: Object
};

function config(ConfigObject = Object) {
  Options.config = ConfigObject;
}

function validateCardNumber(number) {
  var regex = new RegExp("^[0-9]{16}$");
  if (!regex.test(number)) return false;

  return luhnCheck(number);
}

function luhnCheck(val) {
  var sum = 0;
  for (var i = 0; i < val.length; i++) {
    var intVal = parseInt(val.substr(i, 1));
    if (i % 2 == 0) {
      intVal *= 2;
      if (intVal > 9) {
        intVal = 1 + (intVal % 10);
      }
    }
    sum += intVal;
  }
  return sum % 10 == 0;
}

async function check(
  card = String,
  month = String,
  year = String,
  cvv = String
) {
  if (!validateCardNumber(card)) {
    return { error: "Invalid card number." };
  }

  // Payment Request Options
  let pRequestOptions = Options.config;

  let pRequestData = String(pRequestOptions.data)
    .replace("<CARD>", card)
    .replace("<YEAR>", year)
    .replace("<CVV>", cvv)
    .replace("<MONTH>", month);

  pRequestOptions.data = pRequestData;

  // Create Payment Request
  let pRequest = await axios(pRequestOptions).catch(() => {
    return { error: "Error on payment request." };
  });

  let pRequestResponse = JSON.stringify(pRequest.data);

  if (!pRequestResponse) return { error: "Error on payment request." };

  if (String(pRequestResponse).includes(pRequestOptions.keywords.approved)) {
    return { approved: true };
  } else if (
    String(pRequestResponse).includes(pRequestOptions.keywords.declined)
  ) {
    return { declined: true };
  } else {
    return { error: "Unknown error." };
  }
}

module.exports.check = check;
module.exports.config = config;
