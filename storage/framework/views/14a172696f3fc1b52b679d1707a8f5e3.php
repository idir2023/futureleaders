  <?php $__env->startComponent('mail::message'); ?>
# 🎉 Great News! **Your Referral <?php echo e($consultation->name); ?> Has Joined Our Academy**

---

**Dear <?php echo e($consultation->coach->nom); ?> <?php echo e($consultation->coach->prenom); ?>,**

We are excited to let you know that your referral, **<?php echo e($consultation->name); ?>**, has successfully joined our academy.  
**Congratulations!** 🎉 They have enrolled in the **silver package**.

Thank you for your continuous support and dedication in helping us grow. We truly value your efforts. 🙏

Warm regards,  
**Future Leaders Academy**

<?php echo $__env->renderComponent(); ?>

 
<?php /**PATH C:\Users\Aicha njimate\OneDrive\Bureau\futureleaders\resources\views/emails/consultation/consultation_terminer.blade.php ENDPATH**/ ?>