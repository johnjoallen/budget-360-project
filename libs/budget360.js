$(document).ready(function(){
		// validate income and expenditure
		$("#budgetform").validate({
			rules: {
				rent: {
					required: true,
					digits: true
				},
				mortgageprotection:{
					digits: true
				},
				gas: {
					digits: true
				},
				electricity: {
					digits: true
				},
				broadband: {
					digits: true
				},
				phone: {
					required: true,
					digits: true
				},
				waste: {
					digits: true
				},
				tv: {
					digits: true
				},
				car: {
					digits: true
				},
				vehicletax: {
					digits: true
				},
				vehicleinsurance: {
					digits: true
				},
				vehiclefuel: {
					digits: true
				},
				commuting: {
					digits: true
				},
				groceries: {
					digits: true
				},
				lunch: {
					digits: true
				},
				kidslunch: {
					digits: true
				},
				personalitems: {
					digits: true
				},
				literature: {
					digits: true
				},
				insurance: {
					digits: true
				},
				lifeprotection: {
					digits: true
				},
				healthinsurance: {
					digits: true
				},
				pension: {
					digits: true
				},
				incomeprotection: {
					digits: true
				},
				smoking: {
					digits: true
				},
				drinking: {
					digits: true
				},
				snacks: {
					digits: true
				},
				fastfood: {
					digits: true
				},
				gambling: {
					digits: true
				},
				parkingtickets: {
					digits: true
				},
				fines: {
					digits: true
				},
				entertainment: {
					digits: true
				},
				gym: {
					digits: true
				},
				holidays: {
					digits: true
				},
				petexpenses: {
					digits: true
				},
				savings: {
					digits: true
				},
				creditcard1: {
					digits: true
				},
				creditcard2: {
					digits: true
				},
				creditcard3: {
					digits: true
				},
				loan1: {
					digits: true
				},
				loan2: {
					digits: true
				},
				loan3: {
					digits: true
				},
				loan4: {
					digits: true
				},
				loan5: {
					digits: true
				}
			},
			messages: {
				rent: {
					required: "You need to enter a Mortgage/Rent payment",
					digits: "Only numbers can go in here"
				},
				mortgageprotection: "Only Number for the mortgage protection.",
				gas: {
					digits: "Only numbers can go in here"
				},
				electricity: {
					digits: "Only numbers can go in here"
				},
				broadband: "Only numbers can go in here.",
				phone: {
					required: "You need to enter your phone costs.",
					digits: "Only numbers can go in here"
				},
				waste: {
					digits: "Only numbers can go in here"
				},
				tv: {
					digits: "Only numbers can go in here"
				},
				car: "Only numbers can go in here.",
				vehicletax: "Only numbers can go in here.",
				vehicleinsurance: "Only numbers can go in here.",
				vehiclefuel: "Only numbers can go in here.",
				commuting: "Only numbers can go in here.",
				groceries: {
					digits: "Only numbers can go in here."
				},
				lunch: {
					digits: "Only numbers can go in here."
				},
				kidslunch: "Only numbers can go in here.",
				personalitems: {
					digits:"Only numbers can go in here."
				},
				literature: "Only numbers can go in here.",
				insurance: "Only numbers can go in here.",
				lifeprotection: "Only numbers can go in here.",
				healthinsurance: "Only numbers can go in here.",
				pension: "Only numbers can go in here.",
				incomeprotection: "Only numbers can go in here.",
				smoking: "Only numbers can go in here.",
				drinking: "Only numbers can go in here.",
				snacks: "Only numbers can go in here.",
				fastfood: "Only numbers can go in here.",
				gambling: "Only numbers can go in here.",
				parkingtickets: "Only numbers can go in here.",
				fines: "Only numbers can go in here.",
				entertainment: "Only numbers can go in here.",
				gym: "Only numbers can go in here.",
				holiday: "Only numbers can go in here.",
				petexpenses: "Only numbers can go in here.",
				savings: "Only numbers can go in here.",
				creditcard1: "Only numbers can go in here.",
				creditcard2: "Only numbers can go in here.",
				creditcard3: "Only numbers can go in here.",
				loan1: "Only numbers can go in here.",
				loan2: "Only numbers can go in here.",
				loan3: "Only numbers can go in here.",
				loan4: "Only numbers can go in here.",
				loan5: "Only numbers can go in here."
		}
	});
        $("#incomeform").validate({
			rules: {
				income: {
					required:true,
					digits: true
				}
			},
			messages: {
				income: {
					required: "You need to enter an income amount",
					digits: "Only numbers can go here"
				}
			}
	});
        $("#formpopup").validate({
			rules: {
				name: {
					required:true
				},
                                email: {
                                    required:true,
                                    email:true
                                },
                                phone: {
                                    required:true,
                                    digits: true
                                }
			},
			messages: {
				name: {
					required: "You need to enter your name!"
				},
                                email: {
                                    required: "You need to enter your email!",
                                    email: "You must enter a valid email!"
                                },
                                phone: {
                                    required: "You need to enter a phone number",
                                    digits : "Only numbers can go in here"
                                }
			}
	});
        $("#popupemail").validate({
			rules: {
                                email: {
                                    required:true,
                                    email:true
                                }
			},
			messages: {
                                email: {
                                    required: "You need to enter your email!",
                                    email: "You must enter a valid email!"
                                }
			}
	});
        /* Fancy Box elements */
        $('#showemail').fancybox({
            'titlePosition' : 'inside',
            'transitionIn' : 'none',
	    'transitionOut' : 'none'
        });

        $('#showpopup').fancybox({
            'titlePosition' : 'inside',
            'transitionIn' : 'none',
	    'transitionOut' : 'none'
        });

        $('#onloadselector').fancybox({
            'titlePosition' : 'inside',
            'transitionIn' : 'none',
	    'transitionOut' : 'none'
        });

        //tooltips
        $('#incomeform #submit').tooltip();
        $('#budgetform #rent').tooltip();
        $('#budgetform #phone').tooltip();
        $('#budgetform #lifeprotection').tooltip();
        $('#budgetform #credit').tooltip();
        $('#budgetform #submit').tooltip();
        
        $("#print").click(function(){
            $("#piechart").printArea();
        });
});