<?php $__env->startComponent('mail::message'); ?>
# 🎉 Welcome to Our Academy, **<?php echo e($consultation->name); ?>**!

---

**Dear <?php echo e($consultation->name); ?>,**

Welcome to our academy!  
We’re excited to have you join us through the referral of **<?php echo e($consultation->coach->nom); ?> <?php echo e($consultation->coach->prenom); ?> **.

✅ You’ve been successfully registered in the **silver package**, and we’re here to support you on your learning journey.

🧑‍🏫 Feel free to reach out if you need any assistance.

Best regards,  
**Future Leaders Academy**

<?php echo $__env->renderComponent(); ?>
<?php /**PATH C:\Users\Aicha njimate\OneDrive\Bureau\futureleaders\resources\views/emails/consultation/confirmation.blade.php ENDPATH**/ ?>