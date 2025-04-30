@component('mail::message')
    # 🔔 **Action Required: Incomplete Payment**

    ---

    **Hello {{ $consultation->name }},**

    We’ve noticed that **your payment hasn’t been fully completed**. This could be due to a data entry error or a technical
    issue.

    To finalize your transaction, please check your payment details and complete the payment as soon as possible.

    If you’ve encountered any issues or have any questions, feel free to **contact us**. Our team is here to assist you in
    resolving any problems quickly.

    ---

    @component('mail::button', ['url' => 'https://youracademy.example.com/payment', 'color' => 'warning'])
        Complete Payment
    @endcomponent

    ---

    **Thank you for your understanding, and we remain at your disposal.**
    The **Future Leaders Academy** Team
@endcomponent
