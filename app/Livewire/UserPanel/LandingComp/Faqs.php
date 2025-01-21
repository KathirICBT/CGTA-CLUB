<?php

namespace App\Livewire\UserPanel\LandingComp;

use Livewire\Component;

class Faqs extends Component
{
    public $datas = [
       [
           'question' => "How can I ensure secure payment processing for my event?",
           'answer' => "We offer multiple secure payment gateways integrated with encryption to protect your transactions. You can also track all payments through your event dashboard.",
       ],
       [
           'question' => "How do I attract more attendees to my event?",
           'answer' => "Use our promotional tools, including targeted email campaigns, social media integrations, and early-bird discounts, to boost attendance and engagement.",
       ],
       [
           'question' => "Can hosting an event help grow my professional network?",
           'answer' => "Absolutely! Hosting events allows you to connect with like-minded individuals, industry leaders, and potential collaborators. Use our platform’s attendee insights to identify key participants.",
       ],
       [
           'question' => "What are the best practices for hosting a business-focused event?",
           'answer' => "Ensure your event has a clear agenda, provides valuable insights, and includes opportunities for networking. Our platform allows you to manage schedules, speakers, and feedback seamlessly.",
       ],
       [
           'question' => "How can I track the success of my event?",
           'answer' => "Our analytics tools provide detailed reports on attendance, engagement, and feedback, helping you measure success and identify areas for improvement.",
       ],
   ];



    public function render()
    {
        return view('livewire.user-panel.landing-comp.faqs');
    }
}
