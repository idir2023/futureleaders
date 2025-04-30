  @component('mail::message')
# 🎉 Great News! **Your Referral {{ $consultation->name }} Has Joined Our Academy**

---

**Dear {{ $consultation->coach->nom }} {{ $consultation->coach->prenom }},**

We are excited to let you know that your referral, **{{ $consultation->name }}**, has successfully joined our academy.  
**Congratulations!** 🎉 They have enrolled in the **silver package**.

Thank you for your continuous support and dedication in helping us grow. We truly value your efforts. 🙏

Warm regards,  
**Future Leaders Academy**

@endcomponent

 
