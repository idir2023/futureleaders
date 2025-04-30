@component('mail::message')
# 🎉 Welcome to Our Academy, **{{ $consultation->name }}**!

---

**Dear {{ $consultation->name }},**

Welcome to our academy!  
We’re excited to have you join us through the referral of **{{ $consultation->coach->nom }} {{ $consultation->coach->prenom }} **.

✅ You’ve been successfully registered in the **silver package**, and we’re here to support you on your learning journey.

🧑‍🏫 Feel free to reach out if you need any assistance.

Best regards,  
**Future Leaders Academy**

@endcomponent
