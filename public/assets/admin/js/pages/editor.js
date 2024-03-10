tinymce.init({
    selector: "textarea.editor",
    height: 500,
    plugins: ["advlist autolink lists link image charmap preview", "searchreplace visualblocks code fullscreen", "media paste imagetools wordcount hr pagebreak help nonbreaking"],
    toolbar: "undo redo | styleselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
    toolbar_mode: "floating",
    tinycomments_mode: "embedded",
    tinycomments_author: "RevisiKu",
    nonbreaking_force_tab: true,
    imagetools_cors_hosts: ["revisiku.com"],
    imagetools_credentials_hosts: ["revisiku.com"],
  });
