// for message

(function(){
  
    var chat = {
      messageToSend: '',
      messageResponses: [
        ' Thank you for your message! We appreciate your interest in our shop. Our team will get back to you shortly to assist you with your inquiry.',
        'We offer a variety of payment options such as credit card, debit card, PayPal, and bank transfer.',
        'We offer different shipping options depending on your location and the size of your order. You can choose from standard shipping, express shipping, and same-day delivery.',
        'The delivery time will depend on the shipping option you choose and your location. We usually provide an estimated delivery date during the checkout process.',
        'We have a 30-day return policy for most products. If you are not satisfied with your purchase, you can return it for a refund or exchange.',
        'Yes, we have a customer support team available to assist you with any questions or concerns. You can contact us through email, phone, or live chat.'
      ],
      init: function() {
        this.cacheDOM();
        this.bindEvents();
        this.render();
      },
      cacheDOM: function() {
        this.$chatHistory = $('.chat-history');
        this.$button = $('button');
        this.$textarea = $('#message-to-send');
        this.$chatHistoryList =  this.$chatHistory.find('ul');
      },
      bindEvents: function() {
        this.$button.on('click', this.addMessage.bind(this));
        this.$textarea.on('keyup', this.addMessageEnter.bind(this));
      },
      render: function() {
        this.scrollToBottom();
        if (this.messageToSend.trim() !== '') {
          var template = Handlebars.compile( $("#message-template").html());
          var context = { 
            messageOutput: this.messageToSend,
            time: this.getCurrentTime()
          };
  
          this.$chatHistoryList.append(template(context));
          this.scrollToBottom();
          this.$textarea.val('');
          
          // responses
          var templateResponse = Handlebars.compile( $("#message-response-template").html());
          var contextResponse = { 
            response: this.getRandomItem(this.messageResponses),
            time: this.getCurrentTime()
          };
          
          setTimeout(function() {
            this.$chatHistoryList.append(templateResponse(contextResponse));
            this.scrollToBottom();
          }.bind(this), 1500);
          
        }
        
      },
      
      addMessage: function() {
        this.messageToSend = this.$textarea.val()
        this.render();         
      },
      addMessageEnter: function(event) {
          // enter was pressed
          if (event.keyCode === 13) {
            this.addMessage();
          }
      },
      scrollToBottom: function() {
         this.$chatHistory.scrollTop(this.$chatHistory[0].scrollHeight);
      },
      getCurrentTime: function() {
        return new Date().toLocaleTimeString().
                replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3");
      },
      getRandomItem: function(arr) {
        return arr[Math.floor(Math.random()*arr.length)];
      }
      
    };
    
    chat.init();
    
    var searchFilter = {
      options: { valueNames: ['name'] },
      init: function() {
        var userList = new List('people-list', this.options);
        var noItems = $('<li id="no-items-found">No items found</li>');
        
        userList.on('updated', function(list) {
          if (list.matchingItems.length === 0) {
            $(list.list).append(noItems);
          } else {
            noItems.detach();
          }
        });
      }
    };
    
    searchFilter.init();
    
  })();
  //for attach file buttons
  function openFileExplorer() {
    document.getElementById("myFileInput").click();
  }
  
  document.getElementById("myFileInput").addEventListener("change", function() {
    var selectedFile = this.files[0];
    document.getElementById("message-to-send").value = selectedFile.name;
  });

  //JS FOR PRODUCT REVIEW/ SERVICE REVIEW
let stars = document.querySelectorAll(".ratings span")
let products = document.querySelectorAll(".ratings")
let ratings = [];

for(let star of stars){
    star.addEventListener("click",function(){
        this.setAttribute("data-clicked","true");
    });
}
  