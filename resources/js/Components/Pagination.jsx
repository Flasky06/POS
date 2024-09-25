import { Link } from "@inertiajs/react";
import React from "react";

export default function Pagination({ links }) {
  return (
    <nav className="text-center mt-4">
      {links.map((link) => (
        <Link
          preserveScroll
          key={link.label}
          href={link.url || ""}
          className={
            "inline-block py-2 px-4 mx-1 rounded-lg text-xs font-medium transition-colors " +
            (link.active
              ? "bg-gray-900 text-white "
              : "dark:text-black dark:hover:bg-gray-700 dark:hover:text-white") +
            (!link.url ? "cursor-not-allowed opacity-50 " : "")
          }
          dangerouslySetInnerHTML={{ __html: link.label }}
        ></Link>
      ))}
    </nav>
  );
}
